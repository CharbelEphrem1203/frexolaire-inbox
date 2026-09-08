<?php
/**
 * Template Name: Refonte 2026 - Accueil
 *
 * Gabarit de la refonte. Il ne s applique qu aux pages qui le selectionnent
 * explicitement (_wp_page_template), donc jamais a une page publiee qui ne l a
 * pas choisi. En-tete et pied de page Astra conserves : les menus ne bougent pas.
 */
if (!defined('ABSPATH')) { exit; }
get_header();
?>
<main id="content" class="fxn" role="main">

  <!-- ============ HERO : l incidence ============ -->
  <section class="fxn-hero" data-fxn-sun>
    <div class="fxn-grid">
      <div class="fxn-hero__texte">
        <p class="fxn-eyebrow">Installateur RGE QualiPV &middot; Paris et Île-de-France</p>
        <h1 class="fxn-titre" data-fxn-split>Le soleil ne se vend plus. Il se consomme.</h1>
        <p class="fxn-chapo">
          Depuis le 5&nbsp;juin 2026 la prime a disparu et le surplus ne vaut plus
          que 1,1&nbsp;c€/kWh. Nous dimensionnons votre installation sur votre
          courbe de charge réelle, pas sur un contrat de revente.
        </p>
        <div class="fxn-actions">
          <a class="fxn-btn fxn-btn--plein" href="/contactez-nous/">Demander une étude gratuite</a>
          <a class="fxn-btn fxn-btn--ligne" href="/installation-panneaux-solaires/calcul-de-production-photovoltaique/">Estimer ma production</a>
        </div>
      </div>

      <div class="fxn-hero__visuel">
        <!-- Le panneau est dessine en CSS : c est le sujet, et c est plus leger
             qu une image. La lueur or suit le pointeur et l arc du soleil. -->
        <div class="fxn-panneau" data-fxn-tilt aria-hidden="true">
          <div class="fxn-panneau__surface">
            <div class="fxn-panneau__cellules"></div>
            <div class="fxn-panneau__voile"></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ============ L ECART : l unique moment ou la page hausse la voix ============ -->
  <section class="fxn-ecart" aria-labelledby="fxn-ecart-t">
    <div class="fxn-grid fxn-grid--plein">
      <p class="fxn-ecart__nombre"><span data-fxn-compte data-fxn-vers="18">0</span><span class="fxn-ecart__x">&times;</span></p>
      <div class="fxn-ecart__dit">
        <h2 id="fxn-ecart-t" class="fxn-h2">L écart qui décide de tout</h2>
        <p>
          Un kilowattheure acheté au réseau coûte <strong>0,2001&nbsp;€</strong>.
          Le même kilowattheure, injecté en surplus, vous est racheté
          <strong>1,1&nbsp;c€</strong>. Dix-huit fois moins.
        </p>
        <p class="fxn-note">
          Tarif réglementé TTC option base depuis le 1er&nbsp;août 2026 &middot;
          tarif de rachat issu de la réforme du 5&nbsp;juin 2026.
        </p>
      </div>
    </div>
  </section>

  <!-- ============ QUATRE METIERS, en escalier ============ -->
  <section class="fxn-metiers">
    <div class="fxn-grid">
      <h2 class="fxn-h2 fxn-h2--large">Quatre métiers, un seul interlocuteur</h2>
      <ul class="fxn-escalier">
        <li class="fxn-metier fxn-metier--bas">
          <h3>Résidentiel</h3>
          <p>Maison individuelle, toiture tuiles, ardoise ou zinc. Dimensionnement sur consommation réelle, TVA 5,5&nbsp;% jusqu à 9&nbsp;kWc, pose par nos équipes internes.</p>
          <a class="fxn-lien" href="/installation-panneaux-solaires/solutions-residentielles-particuliers/">Panneaux solaires pour particuliers</a>
        </li>
        <li class="fxn-metier fxn-metier--haut">
          <h3>Grandes toitures et centrales</h3>
          <p>Bac acier, hangar, entrepôt. De 100&nbsp;kWc à plusieurs mégawatts, avec business plan sur 25&nbsp;ans et obligations de la loi APER.</p>
          <a class="fxn-lien" href="/installation-panneaux-solaires/systemes-professionnels-entreprises/">Photovoltaïque en entreprise</a>
        </li>
        <li class="fxn-metier fxn-metier--bas">
          <h3>Systèmes électriques et stockage</h3>
          <p>Onduleurs, batteries LiFePO₄, pilotage des usages. Le stockage ne se justifie pas partout&nbsp;: nous le disons quand il ne se justifie pas.</p>
          <a class="fxn-lien" href="/boutique/">Matériel et kits</a>
        </li>
        <li class="fxn-metier fxn-metier--haut">
          <h3>Copropriétés et conseil</h3>
          <p>Autoconsommation collective, vote en assemblée générale, clé de répartition. Nous accompagnons le conseil syndical de l étude au suivi de production.</p>
          <a class="fxn-lien" href="/installation-panneaux-solaires/installations-collectives-coproprietes/">Solaire en copropriété</a>
        </li>
      </ul>
    </div>
  </section>

  <!-- ============ CE QUE CA DONNE, chiffres scrubbes ============ -->
  <section class="fxn-chiffres">
    <div class="fxn-grid">
      <h2 class="fxn-h2">Ce que produit une toiture d Île-de-France</h2>
      <dl class="fxn-stats">
        <div class="fxn-stat">
          <dt>Production annuelle</dt>
          <dd><span data-fxn-compte data-fxn-vers="1100">0</span>&nbsp;kWh<span class="fxn-unite">/kWc/an</span></dd>
        </div>
        <div class="fxn-stat">
          <dt>Inclinaison optimale à Paris</dt>
          <dd><span data-fxn-compte data-fxn-vers="35">0</span>°<span class="fxn-unite">48,86° N</span></dd>
        </div>
        <div class="fxn-stat">
          <dt>À l horizontale</dt>
          <dd><span data-fxn-compte data-fxn-vers="89">0</span>&nbsp;%<span class="fxn-unite">de l optimum</span></dd>
        </div>
        <div class="fxn-stat">
          <dt>À la verticale plein sud</dt>
          <dd><span data-fxn-compte data-fxn-vers="68">0</span>&nbsp;%<span class="fxn-unite">de l optimum</span></dd>
        </div>
      </dl>
      <p class="fxn-note">
        Chaque degré compte&nbsp;: c est pourquoi nous mesurons la toiture avant de
        chiffrer, et non l inverse.
      </p>
    </div>
  </section>

  <!-- ============ CE QUE CA COUTE DE DIRE ============ -->
  <section class="fxn-franchise">
    <div class="fxn-grid fxn-grid--lire">
      <h2 class="fxn-h2">Il nous arrive de dire «&nbsp;pas encore&nbsp;»</h2>
      <p>
        Une toiture trop ombragée, une consommation trop faible, une charpente à
        reprendre&nbsp;: dans ces cas le calcul ne tient pas, et nous le disons
        avant le devis plutôt qu après la pose. Un projet solaire qui ne
        s amortit pas nous coûte moins cher qu un client mécontent pendant
        vingt-cinq ans.
      </p>
    </div>
  </section>

  <!-- ============ DEROULE : vraie sequence, donc numerotee ============ -->
  <section class="fxn-etapes-sec">
    <div class="fxn-grid fxn-grid--lire">
      <h2 class="fxn-h2">De l étude à la mise en service</h2>
      <ol class="fxn-etapes">
        <li><h3>Étude et mesure</h3><p>Relevé de toiture, courbe de charge, ombrage. Gratuit et sans engagement.</p></li>
        <li><h3>Déclaration préalable</h3><p>Dépôt en mairie, instruction d un mois, ABF si vous êtes en zone protégée.</p></li>
        <li><h3>Raccordement Enedis</h3><p>Demande et convention. Comptez 4 à 8&nbsp;semaines en Île-de-France.</p></li>
        <li><h3>Pose et Consuel</h3><p>Installation par nos équipes, attestation de conformité, puis mise en service.</p></li>
      </ol>
      <a class="fxn-btn fxn-btn--plein" href="/contactez-nous/">Devis sous 48&nbsp;heures</a>
    </div>
  </section>

</main>
<?php
get_footer();
