


<main>

           <form  action="<?php echo HOME_URI.'noticia/inserir';?>" method ='POST'>
             <div class='form-group''>
               <label for='exampleFormControlInput1'>titulo</label>
               <input type='text' class='form-control' id='exampleFormControlInput1' name='titulo' placeholder='Insira o título'>
             </div>
             
             
             <div class='form-group' >
               <label for='exampleFormControlTextarea1'>descrição</label>
               <textarea class='form-control' id='exampleFormControlTextarea1' name='descricao' rows='8'></textarea>
             </div>
             <button type='submit' class='btn btn-primary'>Criar Postagem</button>
<a href="<?php echo HOME_URI.'inicio/index'?>"><button type='button' id = 'backHome' class='btn btn-primary'>Voltar á página Home</button></a>
           </form>
          
               
               </main>
               </html>