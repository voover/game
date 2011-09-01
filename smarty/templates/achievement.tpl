<html xmlns="http://www.w3.org/1999/xhtml"
      xmlns:og="http://ogp.me/ns#"
      xmlns:fb="https://www.facebook.com/2008/fbml">
  <head>
    <title>{$achievement['title']}</title>
    <meta property="og:type" content="og:games.achievement"/>
    <meta property="og:url" content="apps.facebook.com/mwawro_game/?action=achievement&id={$achievement['id']}"/>
    <meta property="og:title" content="{$achievement['title']}"/>
    <meta property="og:description" content="{$achievement['desc']}"/>
    <meta property="og:image" content="{$achievement['image']}" />
    <meta property="og:points" content="{$achievement['points']}" />
  </head>
  <body>
    <img src="{$achievement['image']}" width="234" height="234"/>
  </body>
</html>
