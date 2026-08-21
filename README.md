# frexolaire-inbox — pont de publication automatique

Dépôt public servant de **boîte de dépôt** entre la routine de rédaction cloud et le site frexolaire.com.

## Fonctionnement
1. La routine cloud rédige un article et le committe dans `inbox/<slug>.json` (branche master, ou branche `article/<slug>` si le push direct est refusé).
2. Le mu-plugin `fx-article-ingest.php` du site scanne ce dépôt **toutes les heures** (master + branches `article/*`), importe les nouveaux fichiers, publie, purge les caches (LiteSpeed + ADC + Cloudflare) et notifie IndexNow.
3. Chaque fichier traité est mémorisé côté site (option `fx_ingest_done`) — il n'est jamais importé deux fois. Les fichiers restent ici comme archive.

## Format d'un article (`inbox/<slug>.json`)
Voir `inbox/_TEMPLATE.json.example`. Champs : `slug`, `title`, `status` (`publish` ou `draft`), `content_html` (HTML propre : h2/h3/p/ul/li/strong/a/table), `rank_math_title` (≤ 60 car.), `rank_math_description` (150-158 car.), `focus_keyword`, `image_query` (mots-clés pour choisir l'image à la une dans la médiathèque du site).

## Règles
- **Uniquement des articles de blog.** L'ingest ne touche jamais aux pages, produits, WooCommerce.
- Maximum 1 import par passage horaire.
- `data/published-posts.json` = référentiel des articles déjà publiés (anti-cannibalisation pour la routine) — régénéré périodiquement depuis le site.
- Aucun secret dans ce dépôt.
