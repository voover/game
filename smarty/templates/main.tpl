<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>My super game</title>
  </head>
  <body>
    {foreach from=$achievements item=cheevo}
      <input type="submit" value="{$cheevo['title']}" />
    {/foreach}    
  </body>
</html>
