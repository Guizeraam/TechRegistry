<?php
session_start();
if(!isset($_SESSION['usuarioL'])){
    header("Location: ./LOGIN/index.php");
exit;
}
?>
<!DOCTYPE html>
<html>
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <title>Calendario</title>
      <link rel="stylesheet" type="text/css" href="./css/calendario.css">
      <?php header("Refresh: 10;"); ?>
   </head>
   <body background="./img/concreto.jpg" bgproperties="fixed">
      <table>
         <thead>
            <tr>
               <td colspan="7" id="legenda">B01<font color=#045FB4>[ AJL-9855  -  VALDINEI]</font>&nbsp;&nbsp;-&nbsp;&nbsp;B02<font color=#045FB4>[ AQP-4866  -  DELMAR]</font>&nbsp;&nbsp;-&nbsp;&nbsp;B03<font color=#045FB4>[ AVT-2219  -  CLEDSON]</font>&nbsp;&nbsp;-&nbsp;&nbsp;BL4<font color=#045FB4>[ BAA-2150  -  EDERSON]</font>&nbsp;&nbsp;-&nbsp;&nbsp;BL5<font color=#045FB4>[ EQW-9410  - JOSE BEZERRA]</font></td>
            </tr>
         </thead>
         <thead>
            <tr>
               
               <td>
                  <div class="diaM semana">
                     <span text-align="center" >SEGUNDA</span>
                     <table class="up">
                        <tr>
                           <td class="conteudo">
                           </td>
                        </tr>
                     </table>
                  </div>
               </td>
               <td>
                  <div class="diaM semana">
                     <span text-align="center" >TERCA</span>
                     <table class="up">
                        <tr>
                           <td class="conteudo">
                           </td>
                        </tr>
                     </table>
                  </div>
               </td>
               <td>
                  <div class="diaM semana">
                     <span text-align="center" >QUARTA</span>
                     <table class="up">
                        <tr>
                           <td class="conteudo">
                           </td>
                        </tr>
                     </table>
                  </div>
               </td>
               <td>
                  <div class="diaM semana">
                     <span text-align="center" >QUINTA</span>
                     <table class="up">
                        <tr>
                           <td class="conteudo">
                           </td>
                        </tr>
                     </table>
                  </div>
               </td>
               <td>
                  <div class="diaM semana">
                     <span text-align="center" >SEXTA</span>
                     <table class="up">
                        <tr>
                           <td class="conteudo">
                           </td>
                        </tr>
                     </table>
                  </div>
               </td>
               <td>
                  <div class="diaM semana">
                     <span text-align="center" >SABADO</span>
                     <table class="up">
                        <tr>
                           <td class="conteudo">
                           </td>
                        </tr>
                     </table>
                  </div>
               </td>
            </tr>
         </thead>
		 <thead>
            <tr>
               
               <td>
                  <div class="diaM semana">
                     <span text-align="center" >SEGUNDA</span>
                     <table class="up">
                        <tr>
                           <td class="conteudo">
                           </td>
                        </tr>
                     </table>
                  </div>
               </td>
               <td>
                  <div class="diaM semana">
                     <span text-align="center" >TERCA</span>
                     <table class="up">
                        <tr>
                           <td class="conteudo">
                           </td>
                        </tr>
                     </table>
                  </div>
               </td>
               <td>
                  <div class="diaM semana">
                     <span text-align="center" >QUARTA</span>
                     <table class="up">
                        <tr>
                           <td class="conteudo">
                           </td>
                        </tr>
                     </table>
                  </div>
               </td>
               <td>
                  <div class="diaM semana">
                     <span text-align="center" >QUINTA</span>
                     <table class="up">
                        <tr>
                           <td class="conteudo">
                           </td>
                        </tr>
                     </table>
                  </div>
               </td>
               <td>
                  <div class="diaM semana">
                     <span text-align="center" >SEXTA</span>
                     <table class="up">
                        <tr>
                           <td class="conteudo">
                           </td>
                        </tr>
                     </table>
                  </div>
               </td>
               <td>
                  <div class="diaM semana">
                     <span text-align="center" >SABADO</span>
                     <table class="up">
                        <tr>
                           <td class="conteudo">
                           </td>
                        </tr>
                     </table>
                  </div>
               </td>
            </tr>
         </thead>
		 <thead>
            <tr>
               
               <td>
                  <div class="diaM semana">
                     <span text-align="center" >SEGUNDA</span>
                     <table class="up">
                        <tr>
                           <td class="conteudo">
                           </td>
                        </tr>
                     </table>
                  </div>
               </td>
               <td>
                  <div class="diaM semana">
                     <span text-align="center" >TERCA</span>
                     <table class="up">
                        <tr>
                           <td class="conteudo">
                           </td>
                        </tr>
                     </table>
                  </div>
               </td>
               <td>
                  <div class="diaM semana">
                     <span text-align="center" >QUARTA</span>
                     <table class="up">
                        <tr>
                           <td class="conteudo">
                           </td>
                        </tr>
                     </table>
                  </div>
               </td>
               <td>
                  <div class="diaM semana">
                     <span text-align="center" >QUINTA</span>
                     <table class="up">
                        <tr>
                           <td class="conteudo">
                           </td>
                        </tr>
                     </table>
                  </div>
               </td>
               <td>
                  <div class="diaM semana">
                     <span text-align="center" >SEXTA</span>
                     <table class="up">
                        <tr>
                           <td class="conteudo">
                           </td>
                        </tr>
                     </table>
                  </div>
               </td>
               <td>
                  <div class="diaM semana">
                     <span text-align="center" >SABADO</span>
                     <table class="up">
                        <tr>
                           <td class="conteudo">
                           </td>
                        </tr>
                     </table>
                  </div>
               </td>
            </tr>
         </thead>
		 <thead>
            <tr>
               
               <td>
                  <div class="diaM semana">
                     <span text-align="center" >SEGUNDA</span>
                     <table class="up">
                        <tr>
                           <td class="conteudo">
                           </td>
                        </tr>
                     </table>
                  </div>
               </td>
               <td>
                  <div class="diaM semana">
                     <span text-align="center" >TERCA</span>
                     <table class="up">
                        <tr>
                           <td class="conteudo">
                           </td>
                        </tr>
                     </table>
                  </div>
               </td>
               <td>
                  <div class="diaM semana">
                     <span text-align="center" >QUARTA</span>
                     <table class="up">
                        <tr>
                           <td class="conteudo">
                           </td>
                        </tr>
                     </table>
                  </div>
               </td>
               <td>
                  <div class="diaM semana">
                     <span text-align="center" >QUINTA</span>
                     <table class="up">
                        <tr>
                           <td class="conteudo">
                           </td>
                        </tr>
                     </table>
                  </div>
               </td>
               <td>
                  <div class="diaM semana">
                     <span text-align="center" >SEXTA</span>
                     <table class="up">
                        <tr>
                           <td class="conteudo">
                           </td>
                        </tr>
                     </table>
                  </div>
               </td>
               <td>
                  <div class="diaM semana">
                     <span text-align="center" >SABADO</span>
                     <table class="up">
                        <tr>
                           <td class="conteudo">
                           </td>
                        </tr>
                     </table>
                  </div>
               </td>
            </tr>
         </thead>
         <tbody>
         </tbody>
      </table>
      </tr>
      </table>
   </body>
</html>

