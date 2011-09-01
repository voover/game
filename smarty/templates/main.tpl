<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <script type="text/javascript" src="js/jquery-1.6.2.min.js"></script>
    <title>My super game</title>
  </head>
  <body>
    <div id="fb-root"></div>
    <div class="section>
      <div class="sectionTitle">Logs</div>
      <div class="sectionContent">
        <textarea rows="10" cols="100" id="logs">
        </textarea>
      </div>
    </div>    
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
        <div class="description">
          This button will deregister all achievements for application and register them again for http://apps.{$sandbox}facebook.com/mwawro_game (important for quick transitions!!!)
        </div><input type="submit" value="Reregister achievements" onclick="reregisterCheevos('{$sandbox}')" />
      </div>
    </div>    
    <script src="http://connect.facebook.net/en_US/all.js"></script>  
    <script type="text/javascript" src="js/script.js"></script>
  </body>
</html>
