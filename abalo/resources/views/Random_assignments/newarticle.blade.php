@extends('Templates/base_template')

@section('title','New Article')

@section('content')
    <form id="articleForm" method="post" action="/newarticle">

        <div id="formBody" style="width: 90vw;margin: auto;"></div>
    </form>
@endsection

@section('more_script')
    <script type="text/javascript">

        addEventListener('load',function (){
            console.log('start create')
            //create form
            let form = document.getElementById('formBody');
            let name = document.createElement('input');
            let price = document.createElement('input');
            let description = document.createElement('input');
            let seller = document.createElement('input');
            let submitBtn = document.createElement('button');


            //name
            name.type = 'text';
            name.id = 'articleName';
            name.name = 'articleName';
            name.classList.add('form-control');
            //label
            let nameLabel = document.createElement('label');
            nameLabel.className = 'form-check-label';
            nameLabel.setAttribute('for','articleName');
            nameLabel.innerHTML = 'Artikel Name:';

            //price
            price.type = 'text';
            price.id = 'articlePrice';
            price.name = 'articlePrice';
            price.classList.add('form-control');
            //label
            let priceLabel = document.createElement('label');
            priceLabel.className = 'form-check-label';
            priceLabel.setAttribute('for','articleName');
            priceLabel.innerHTML = 'Artikel Preis:';


            //description
            description.type = 'text';
            description.id = 'articleDescription';
            description.name = 'articleDescription';
            description.classList.add('form-control');
            //label
            let descLabel = document.createElement('label');
            descLabel.className = 'form-check-label';
            descLabel.setAttribute('for','articleName');
            descLabel.innerHTML = 'Artikel Beschreibung:';


            //seller
            seller.type = 'text';
            seller.id = 'articleSeller';
            seller.name = 'articleSeller';
            seller.classList.add('form-control');
            //label
            let sellerLabel = document.createElement('label');
            sellerLabel.className = 'form-check-label';
            sellerLabel.setAttribute('for','articleName');
            sellerLabel.innerHTML = 'Artikel Verkäufer:';


            //submitBtn
            submitBtn.type = 'Button';
            submitBtn.id = 'articleSubmitBtn';
            submitBtn.innerText = 'Speichern';
            submitBtn.classList.add('btn');
            submitBtn.classList.add('btn-primary');
            //submitBtn.setAttribute('onclick','saveArticle()');




            //appending all elements
            form.appendChild(nameLabel);
            form.appendChild(name);
            form.appendChild(priceLabel);
            form.appendChild(price);
            form.appendChild(descLabel);
            form.appendChild(description);
            form.appendChild(sellerLabel);
            form.appendChild(seller);
            form.appendChild(document.createElement('br'));
            form.appendChild(submitBtn);

        })

        window.onload = function (){
            document.getElementById('articleSubmitBtn')
                    .addEventListener('click', event => {
                       let formname = document.getElementById('articleName').value;
                       let formprice = document.getElementById('articlePrice').value;
                       let formdesc = document.getElementById('articleDescription').value;
                       let formseller = document.getElementById('articleSeller').value;

                       event.preventDefault();
                       sendData(formname, formprice, formdesc, formseller);
                       return false;
                    });
        }
        function sendData(name, price, desc, seller){
            if(validation()) {
           //      let xhr = new XMLHttpRequest();
           //      xhr.open('POST', 'http://127.0.0.1:8000/api/articles/',true);
           //      xhr.setRequestHeader("X-CSRF-TOKEN",
           //         document.getElementById("csrf-token").getAttribute('content')
           //      );
           // //     let data = JSON.stringify({articleName: name, articlePrice: price, articleDescription: desc, articleSeller: seller});
           //    //  console.log(data);
           //      xhr.send("articleName="+name+"&articlePrice="+price+"&articleDescription=" +desc+"&articleSeller="+seller);

                let xhr = new XMLHttpRequest();
                xhr.open('POST', 'http://127.0.0.1:8000/api/articles/');
                xhr.setRequestHeader("X-CSRF-TOKEN",
                    document.getElementById("csrf-token").getAttribute('content')
                );

                let formData = new FormData();
                formData.append("articleName", name);
                formData.append("articlePrice", price);
                formData.append("articleDescription", desc);
                formData.append("articleSeller", seller);
                xhr.send(formData);

                //felder leeren
                document.getElementById('articleName').value = "";
                document.getElementById('articlePrice').value = "";
                document.getElementById('articleDescription').value = "";
                document.getElementById('articleSeller').value = "";

                let p = document.createElement('p');
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4){
                        if (xhr.status === 201)
                        {
                            p.innerHTML = "Produkt wurde hinzugefügt!";
                        }
                        else
                        {
                            p.innerText= "Produkt hinzufügen fehlgeschlagen!"
                        }
                    }
                    document.getElementById('formBody').appendChild(p);
                }


            }
        }


        //form validation
        function validation(){
            let articleName = document.getElementById('articleName').value;
            let articlePrice = document.getElementById('articlePrice').value;
            let articleDescription = document.getElementById('articleDescription').value;
            let articleSeller = document.getElementById('articleSeller').value;

            if (articleName === '' || articlePrice === '' || articleDescription === '' || articleSeller === ''){
                alert("Es müssen alle Felder gefüllt sein!");
                console.log("Space Fail")
                return false;
            }
            else if (parseInt(articlePrice) < 0){
                alert("Der Preis muss größer als 0€ sein!");
                console.log("Price fail")
                return false;
            }
            else if (!articlePrice.match('^[0-9]*$')){
                alert('Der Preis muss eine Zahl sein');
                console.log('Number Fail');
                return false
            }
            else
                return true;
        }



    </script>
@endsection
