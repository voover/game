<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <script type="text/javascript" src="js/jquery-1.6.2.min.js"></script>
    <title>My super game</title>
  </head>
  <body>
    <div id="fb-root"></div>
    <script src="http://connect.facebook.net/en_US/all.js"></script>  
    <script type="text/javascript" src="js/script.js"></script>
    <div class="section">
      <div class="sectionTitle">Achievements</div>
      <div class="sectionContent">        
        {foreach from=$achievements item=cheevo}
          <div class="cheevoNav">
            {$cheevo['title']}
            <input type="submit" value="Grant" onclick="grantCheevo({$cheevo['id']})" />
            <input type="submit" value="Remove" onclick="removeCheevo({$cheevo['id']})" />
          </div>
        {/foreach}
      </div>    
  </body>
</html>
