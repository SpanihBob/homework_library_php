<?   
    include_once "$path/private/head.php";  //                      #########   head  #########        
?>

<body>
    <div class="container">                        
        <header class="header">
            <? include_once "$path/private/header.php"; ?>  <!--        #########   header  #########    -->
        </header> 
        <main>
            main.php

        </main>
        <footer class="footer">
            <? include_once "$path/private/footer.php"?>
        </footer>
    </div>




    <script>
        function ShowMsg() {

            ////////////////////       чат версия 1       //////////////////// 

            // $.ajax({
            //     url:"/system/showmsg.php",
            //     success: data=>{
            //         chat.innerHTML=data;
            //     }
            // })

            ////////////////////       чат версия 2       ////////////////////
            
            //подключаемся к файлу /system/postbooks.php
            fetch(`/system/postbooks.php`)
                // в случае успеха преобразуем ответ от этого файла в json
                .then(response => response.json())
                //в случае успешного перевода в текст преобразованую инф выводим в чат  
                .then(data => {
                    for(let i = 0; i < data.length; i++) {
                        msgId = data[i].id;

                        // let newDiv = document.createElement('div'); 
                        // let newSpanLogin = document.createElement('span');
                        // let newSpanMsg = document.createElement('span');
                        // let newDivMsg = document.createElement('div');

                        // let textLogin = document.createTextNode(`${data[i].login}: `);//создаем текст логина
                        // let textMsg = document.createTextNode(data[i].msg);//создаем текст сообщения

                        // // вставляем текст в спаны
                        // newSpanLogin.appendChild(textLogin);
                        // newSpanMsg.appendChild(textMsg);

                        // //устанавливаем стили: цвет логина и сообщения и размер текста сообщения
                        // newSpanLogin.style.color = data[i].color_login;
                        // newSpanMsg.style.color = data[i].color_msg;
                        // newSpanMsg.style.fontSize = `${data[i].font_size}px`;

                        // //добавляем класс
                        // newDiv.classList.add("chat_msg");

                        // // добавим атрибут
                        // newDiv.setAttribute("data-id",data[i].id);

                        // // вставляем спаны в дивы
                        // newDivMsg.appendChild(newSpanLogin);
                        // newDivMsg.appendChild(newSpanMsg);
                        // newDiv.appendChild(newDivMsg);
                       

                        // // вставляем дивы в чат
                        // chat.appendChild(newDiv);
                    }
                        

                    }
                ).catch(()=>{      //в случау ошибки, т.е. если не будут приняты данные
                    console.log("Новых данных нет");
                }) 
            
        }
        ShowMsg();
    </script>
	
</body>
</html> 

