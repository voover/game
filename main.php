<?php

$achievements =
  array(
    array('title' => 'Sehnsucht',
          'desc'  => '',
          'image' => '',
          'id'    => 0),
    array('title' => 'Herzeleid',
          'desc'  => 'Herzeleid (dated German for Heartache) is the debut album by German Metal band Rammstein. It was released on 29 September 1995. The album\'s original cover depicted the bandmembers\' upper bodies without clothing.',
          'image' => 'http://upload.wikimedia.org/wikipedia/en/1/1f/Rammstein_Herzeleid_cover.jpg',
           'id'   => 1),
    array('title' => 'Mutter',
          'desc'  => '',
          'image' => ''),
    array('title' => 'Reise, Reise',
          'desc'  => '',
          'image' => ''),
    array('title' => 'Rosenrot',
          'desc'  => '',
          'image' => ''));

$smarty->assign('achievements', $achievements);
$smarty->display('main.tpl');
  
              
        
                  
