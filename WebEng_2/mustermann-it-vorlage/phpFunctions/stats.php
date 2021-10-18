<?php
      ini_set("session.use_trans_sid","1");
      ini_set("session.use_cookies","1");
      ini_set("session.use_only_cookies","0");
      session_start();

      if(isset($_SESSION['anz_Seiten']))
        {
          $anz_Seiten = $_SESSION['anz_Seiten'];
          $anz_Seiten++;
        }else
        {
          $anz_Seiten = 1;
        }

        if(isset($_SESSION['startzeit']))
        {
          $zeit = time() - $_SESSION['startzeit'];
        }else
        {
          $_SESSION['startzeit'] = time();
          $zeit = 0;
        }

        if(isset($_SESSION['page_History']))
        {
          $history = $_SESSION['page_History'];
          $history[]= $_SERVER['SCRIPT_NAME'];
          $_SESSION['page_History'] = $history;
        }else
        {
          $history[0] = $_SERVER['SCRIPT_NAME'];
          $_SESSION['page_History'] = $history;
        }
  
        $_SESSION['anz_Seiten'] = $anz_Seiten;         
    ?>