<?  

    include_once "$path/private/head.php";  //                      #########   head  #########        
?>

<body>
    <div class="container">                        
        <header class="header">
            <? include_once "$path/private/header.php"; ?>  <!--        #########   header  #########    -->
        </header> 
        <main>
            <div id="bookContFavoritPage"></div>
            <div id="bookInfoContFavoritPage"></div>
        </main>
        <footer class="footer">
            <? include_once "$path/private/footer.php"?>
        </footer>
    </div>
    <script>
        function ShowFavoritBooks() {            
            fetch(`/system/postFavoritBooks.php`)                          //подключаемся к файлу /system/postFavoritBooks.php                
                .then(response => response.json())                  // в случае успеха преобразуем ответ от этого файла в json                 
                .then(data => {                                     //в случае успешного перевода в текст преобразованую инф выводим в чат
                    for(let i = 0; i < data.length; i++) {
                        const bookId = data[i].id;

                        const newDiv = document.createElement('div');                             //родительский DIV для вывода data[i]

                            const newDivPoster = document.createElement('div');                   //родительский DIV для вывода обложки книги  
                                const bookPoster = document.createElement('img');                 //img для вывода data[i].front
                                const status = document.createElement('div');                     //img для вывода data[i].status

                        if(data[i].status == 1) {
                            status.innerHTML = "<span style='color:green'>Есть в наличии</span>";
                        }
                        else {
                            status.innerHTML = "<span style='color:red'>Нет в наличии</span>"
                        }
                        
                        newDiv.classList.add("main_book");                   //добавляем класс
                        newDivPoster.classList.add("bookImgDiv");
                        
                        bookPoster.setAttribute("src",`../img/${data[i].front}`);      // добавим атрибут
                        bookPoster.setAttribute("data-id",data[i].id); 
                        
                        bookPoster.id = "imageFavoritPage";
                        
                        newDivPoster.appendChild(bookPoster);           // вставляем дочерние элементы в родителя'
                        newDivPoster.appendChild(status);           // вставляем дочерние элементы в родителя'

                        newDiv.appendChild(newDivPoster);                        
                        
                        bookContFavoritPage.appendChild(newDiv);                   //выводим книги на экран

       

                        bookContFavoritPage.onclick = (event) => {
                            if(event.target.id == "imageFavoritPage") {
                                const selectedBookId = event.target.getAttribute("data-id");
                                bookContFavoritPage.style.display = "none";
                                bookInfoContFavoritPage.style.display = "grid";

                                const fullParentDiv = document.createElement('div');

                                const fullInfoNewDivPoster = document.createElement('div');               //родительский DIV для вывода обложки книги  
                                    const fullInfoBookPoster = document.createElement('img');                 //img для вывода data[i].front

                                const newInfo = document.createElement('div');                    //родительский DIV для вывода остальной информации
                                    const backBtn = document.createElement('input');               //Btn для выхода
                                    const newInfo_author = document.createElement('div');             //DIV для вывода data[i].author
                                    const newInfo_title = document.createElement('div');              //DIV для вывода data[i].title
                                    const newInfo_publisher = document.createElement('div');          //DIV для вывода data[i].publisher
                                    const newInfo_release_year = document.createElement('div');       //DIV для вывода data[i].release_year
                                    const newInfo_genre = document.createElement('div');              //DIV для вывода data[i].genre
                                    const newInfo_description = document.createElement('div');        //DIV для вывода data[i].description
                                    const newInfo_status = document.createElement('div');             //DIV для вывода data[i].status
                                    const addFavoritesBtn = document.createElement('input');             //Btn для добавленияизбранного


                                    const textAuthor = document.createTextNode(`Автор: ${data[selectedBookId - 1].author}`);               //автор
                                    const textTitle = document.createTextNode(`Название книги: ${data[selectedBookId - 1].title}`);        //название книги
                                    const textPublisher = document.createTextNode(`Издательство: ${data[selectedBookId - 1].publisher}`);  //издательство
                                    const textRelease = document.createTextNode(`Год выпуска: ${data[selectedBookId - 1].release_year}`);  //год выхода книги
                                    const textGenre = document.createTextNode(`Жанр: ${data[selectedBookId - 1].genre}`);                  //жанр
                                    const textDescription = document.createTextNode(`Описание: ${data[selectedBookId - 1].description}`);  //описание
                                    
                                    let textStatus;
                                    if(data[selectedBookId - 1].status == 1) {
                                        newInfo_status.innerHTML = "<span style='color:green'>Есть в наличии</span>";
                                    }
                                    else {
                                        newInfo_status.innerHTML = "<span style='color:red'>Нет в наличии</span>"
                                    }
                                    

                                    backBtn.setAttribute("type","button");
                                    backBtn.setAttribute("value","Назад");
                                    backBtn.id = ("backBtn");
                                    fullInfoBookPoster.setAttribute("src",`../img/${data[selectedBookId - 1].front}`);
                                    fullInfoBookPoster.classList.add("fullInfoBookPoster");
                                    fullInfoNewDivPoster.classList.add("fullInfoNewDivPoster");
                                    newInfo.classList.add("newInfo");
                                    fullParentDiv.classList.add("fullParentDiv");
                                    addFavoritesBtn.setAttribute("type","button");
                                    addFavoritesBtn.setAttribute("value","Добавить в избранное");

                                newInfo_author.appendChild(textAuthor);           // вставляем текст в div
                                newInfo_title.appendChild(textTitle);
                                newInfo_publisher.appendChild(textPublisher);
                                newInfo_release_year.appendChild(textRelease);
                                newInfo_genre.appendChild(textGenre);
                                newInfo_description.appendChild(textDescription);


                                newInfo.appendChild(backBtn);            //добавляем дочерние в родителя
                                newInfo.appendChild(newInfo_author);           
                                newInfo.appendChild(newInfo_title);
                                newInfo.appendChild(newInfo_publisher);
                                newInfo.appendChild(newInfo_release_year);
                                newInfo.appendChild(newInfo_genre);
                                newInfo.appendChild(newInfo_description);
                                newInfo.appendChild(newInfo_status);
                                newInfo.appendChild(addFavoritesBtn);

                                fullInfoNewDivPoster.appendChild(fullInfoBookPoster);

                                fullParentDiv.appendChild(fullInfoNewDivPoster);
                                fullParentDiv.appendChild(newInfo);

                                bookInfoContFavoritPage.appendChild(fullParentDiv);


                                backBtn.onclick = () => {               //при нажатии кнопки "назад" меняем стили родителей иудаляем все дочерние элементы из bookInfoCont
                                    bookContFavoritPage.style.display = "grid";
                                    bookInfoContFavoritPage.style.display = "none";

                                    while (bookInfoCont.firstChild) {
                                        bookInfoContFavoritPage.removeChild(bookInfoCont.firstChild);
                                    }
                                }


                                addFavoritesBtn.onclick = () => {       //кнопка "Добавить в избранное"
                                    
                                    // console.log(jsonToFavor);
                                    fetch("/system/addToFavorites.php", {
                                        method: 'post',
                                        headers: {
                                            "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
                                        },
                                        body: `favorites=${data[selectedBookId - 1].id}`,
                                    }) 
                                    // .then(response => response.text()) 
                                    // .then(data => console.log(data))
                                }
                            }
                        }
                    }
                    }
                ).catch(()=>{      //в случау ошибки, т.е. если не будут приняты данные
                    console.log("Новых данных нет");
                }) 
        }   
        ShowFavoritBooks();
    </script>

	
</body>
</html> 


