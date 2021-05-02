@extends('Templates/base_template')

@section('title','New Article')

@section('content')
    <form id="articleForm" method="post">
        @csrf
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
            sellerLabel.innerHTML = 'Artikel Verkufer:';


            //submitBtn
            submitBtn.type = 'Button';
            submitBtn.id = 'articleSubmitBtn';
            submitBtn.innerText = 'Speichern';
            submitBtn.classList.add('btn');
            submitBtn.classList.add('btn-primary');
            submitBtn.setAttribute('onclick','saveArticle()');




            //appending all elements
            form.appendChild(nameLabel);
            form.appendChild(name);
            form.appendChild(priceLabel);
            form.appendChild(price);
            form.appendChild(descLabel);
            form.appendChild(description);
            form.appendChild(sellerLabel);
            form.appendChild(seller);
            form.appendChild(submitBtn);

        })

        //submit
        function saveArticle(){
            if (validation())
            {
                document.getElementById('articleForm').submit();
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
