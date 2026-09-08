/* Refonte FreXolaire 2026 — couche de mouvement.
 *
 * Pas de GSAP : tout ce qui suit tient en CSS custom properties + rAF, et
 * n anime que transform/opacity. Coupez ce script, la page reste parfaitement
 * lisible — c est la regle de degradation du §11.
 *
 * Tier 1 retenu : lumiere au pointeur, arc solaire scrubbe, compteurs scrubbes.
 * Tier 2 retenu : revelation du titre, une seule fois, au chargement.
 * Rien ne s epingle. Rien ne bouge sur mobile.
 */
(function () {
  'use strict';

  var racine = document.querySelector('.fxn');
  if (!racine) { return; }

  var reduit = window.matchMedia('(prefers-reduced-motion: reduce)');
  var finPointeur = window.matchMedia('(hover: hover) and (pointer: fine)');
  var large = window.matchMedia('(min-width: 901px)');

  /* ---------- 1. Revelation du titre, mot a mot, une seule fois ---------- */

  function decouperTitre() {
    var t = racine.querySelector('[data-fxn-split]');
    if (!t || t.dataset.fxnFait) { return; }
    t.dataset.fxnFait = '1';
    if (reduit.matches) { return; }
    var mots = t.textContent.trim().split(/\s+/);
    t.textContent = '';
    mots.forEach(function (mot, i) {
      var s = document.createElement('span');
      s.className = 'fxn-mot';
      s.style.setProperty('--i', i);
      s.textContent = mot;
      t.appendChild(s);
      if (i < mots.length - 1) { t.appendChild(document.createTextNode(' ')); }
    });
  }

  /* ---------- 2. Lumiere au pointeur ----------
     Une seule propriete custom, ecrite dans un rAF. Aucun rendu React, aucun
     recalcul de mise en page : le degrade radial lit --lx / --ly. */

  var lx = 50, ly = 30, enAttente = false;

  function appliquerLumiere() {
    enAttente = false;
    racine.style.setProperty('--lx', lx.toFixed(2) + '%');
    racine.style.setProperty('--ly', ly.toFixed(2) + '%');
  }

  function surPointeur(e) {
    var hero = racine.querySelector('.fxn-hero');
    if (!hero) { return; }
    var r = hero.getBoundingClientRect();
    lx = ((e.clientX - r.left) / r.width) * 100;
    ly = ((e.clientY - r.top) / r.height) * 100;
    if (!enAttente) { enAttente = true; requestAnimationFrame(appliquerLumiere); }
  }

  /* ---------- 3. Inclinaison du panneau au pointeur, 6 degres maximum ---------- */

  function surPointeurPanneau(e) {
    var p = racine.querySelector('[data-fxn-tilt] .fxn-panneau__surface');
    if (!p) { return; }
    var r = p.getBoundingClientRect();
    var cx = (e.clientX - r.left) / r.width - 0.5;
    var cy = (e.clientY - r.top) / r.height - 0.5;
    p.style.setProperty('--ty', (cx * 6).toFixed(2));
    p.style.setProperty('--tx', (-cy * 6).toFixed(2));
  }

  /* ---------- 4. Arc solaire scrubbe + compteurs ----------
     Un seul listener de defilement, throttle en rAF, qui pilote :
       --sun  : 0 -> 1, la course du soleil et l angle du voile antireflet
       les compteurs, scrubbes sur leur propre entree dans le viewport */

  var compteurs = [].slice.call(racine.querySelectorAll('[data-fxn-compte]'));

  function formater(n) {
    return n.toLocaleString('fr-FR');
  }

  function majDefilement() {
    enAttenteScroll = false;

    var hero = racine.querySelector('.fxn-hero');
    if (hero) {
      var r = hero.getBoundingClientRect();
      var total = r.height + window.innerHeight;
      var vu = window.innerHeight - r.top;
      var p = Math.min(1, Math.max(0, vu / total));
      racine.style.setProperty('--sun', p.toFixed(4));
    }

    compteurs.forEach(function (el) {
      var cible = parseFloat(el.dataset.fxnVers || '0');
      var r = el.getBoundingClientRect();
      // 0 quand l element entre par le bas, 1 quand il a monte d un tiers d ecran
      var p = (window.innerHeight - r.top) / (window.innerHeight * 0.55);
      p = Math.min(1, Math.max(0, p));
      var v = Math.round(cible * p);
      if (el.dataset.fxnDernier !== String(v)) {
        el.dataset.fxnDernier = String(v);
        el.textContent = formater(v);
      }
    });
  }

  var enAttenteScroll = false;
  function surDefilement() {
    if (!enAttenteScroll) { enAttenteScroll = true; requestAnimationFrame(majDefilement); }
  }

  /* ---------- Etat statique : ce que voit quiconque refuse le mouvement ---------- */

  function etatStatique() {
    racine.style.setProperty('--sun', '0.5');   // soleil au zenith
    racine.style.setProperty('--lx', '30%');
    racine.style.setProperty('--ly', '22%');
    compteurs.forEach(function (el) {
      el.textContent = formater(parseFloat(el.dataset.fxnVers || '0'));
    });
  }

  /* ---------- Cablage ---------- */

  function demarrer() {
    decouperTitre();

    if (reduit.matches) { etatStatique(); return; }

    // Les compteurs et l arc ne dependent pas du pointeur : ils marchent partout.
    majDefilement();
    window.addEventListener('scroll', surDefilement, { passive: true });
    window.addEventListener('resize', surDefilement, { passive: true });

    // La lumiere au pointeur n a de sens qu avec une souris, sur grand ecran.
    if (finPointeur.matches && large.matches) {
      window.addEventListener('pointermove', function (e) {
        surPointeur(e);
        surPointeurPanneau(e);
      }, { passive: true });
    } else {
      racine.style.setProperty('--lx', '30%');
      racine.style.setProperty('--ly', '20%');
    }
  }

  // Le script est charge en defer ; si LiteSpeed le combine et le retarde,
  // le DOM peut deja etre pret : on couvre les deux cas.
  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', demarrer, { once: true });
  } else {
    demarrer();
  }

  // Si l utilisateur change son reglage en cours de route, on respecte.
  if (reduit.addEventListener) {
    reduit.addEventListener('change', function () { if (reduit.matches) { etatStatique(); } });
  }
})();
