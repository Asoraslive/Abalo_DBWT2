@extends('Templates/base_template')
@section('title','Article Table')

@section('content')
    <form method="GET" action="{{route('articles.show')}}" class="d-flex justify-content-center">
        <input id="search-text" name="search" class="form-control" type="search" placeholder="Suche nach Artikel" aria-label="Search" style="width: 50vw">
        <button class="btn btn-outline-primary" type="submit">Suchen</button>

        <button class="btn btn-outline-primary" type="button" onclick="showCreateModal()">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
            </svg>
        </button>
    </form>

    <div class="modal fade" id="createArticleModal" tabindex="-1" role="dialog" aria-labelledby="createArticleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 id="createArticleModalLabel">Bitte geben sie den zu Speichernden Artikel ein!</h4>
                </div>
                <form action="#" method="post" name="articleSaveForm" id="articleSaveForm">
                    @csrf
                    <div class="modal-body mb-3">
                        <label for="articleName" class="col-sm-2 col-form-label">Artikel</label>
                        <input type="text" id="articleName" name="articleName" class="form-control">
                        <label for="articlePrice" class="col-sm-2 col-form-label">Preis</label>
                        <input type="number" id="articlePrice" name="articlePrice" class="form-control">
                        <label for="articleDescription" class="col-sm-2 col-form-label">Beschreibung</label>
                        <textarea id="articleDescription" name="articleDescription" class="form-control"></textarea>
                        <label for="articleSeller" class="col-sm-2 col-form-label">Verkäufer</label>
                        <input type="text" id="articleSeller" name="articleSeller" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button id="submitBtn" type="button" class="btn btn-primary btn-lg btn-block" data-dismiss="modal" onclick="saveArticle()">Speichern</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="warenkorb" class="" style="display: flex;justify-content: center;margin-top: 10px;">
        <button id="warenkorbButton" class="btn " data-bs-toggle="collapse" data-bs-target="#warenkorbListe" aria-expanded="false" aria-controls="warenkorbListe">Warenkorb</button>
    </div>
    <div class="collapse" id="warenkorbListe" style="width: auto;margin-top: 10px">
        <table class="table" id="warenkorbTabelle" style="margin:20px 5vw 20px 5vw;width: 90vw">
        </table>
    </div>



@if($articles)
    <table class="table" style="margin:20px 5vw 20px 5vw;width: 90vw">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Artikel</th>
            <th scope="col">Preis</th>
            <th scope="col">Beschreibung</th>
            <th scope="col">Ersteller</th>
        </tr>
        </thead>
        <tbody>
        @foreach($articles as $article)
            <tr id="item{{$article->id}}">
                <th scope="row" >{{$article->id}}</th>
                <td>{{$article->ab_name}}</td>
                <td>{{$article->ab_price}}€</td>
                <td>{{$article->ab_description}}</td>
                <td>{{$article->user()->first()->ab_name}}</td>
                <td><button type="button" class="btn" onclick="addToBuy({{$article->id}})"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16"><path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/><path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/></svg></button></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endif
@endsection
@section('more_script')
    <script type="text/javascript">

        //warenkorb
        //checkfunction
        function checkIfShoppingItemExists(itemId){
            console.log("getting checked")
            let warenkorb = document.getElementById('warenkorbTabelle');
            let warenkorbItems = warenkorb.childNodes;
            let exists=false ;
            warenkorbItems.forEach(items =>{
                console.log(warenkorbItems.length);
                console.log(items.id);
                console.log('shoppingKart'+itemId);

                if (items.id === 'shoppingKart'+itemId){

                    console.log('true');
                    exists = true;

                }
            });
            return exists;
        }
        //add function
        function addToBuy(itemId){

            //get warenkorb element
            let warenkorb = document.getElementById('warenkorbTabelle');
            //get element to add
            let addItem = document.getElementById('item'+itemId);
            //check if to addItem exists
            if(!checkIfShoppingItemExists(itemId))
            {
                let tr = addItem.cloneNode(true);
                tr.id = "shoppingKart"+itemId;
                tr.childNodes[11].innerHTML = " <td><button class='btn' type='button' onclick='deleteFromCart("+itemId+")' ><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16'fill='currentColor' class='bi bi-dash-circle' viewBox='0 0 16 16'><path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'/><path d='M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z'/></svg></button></td>";
                warenkorb.appendChild(tr);
            }
            else
                alert("item already exists")
        }

        //delete from Cart
        function deleteFromCart(deleteId) {
            let shopTable = document.getElementById('warenkorbTabelle');
            let deleteItem = document.getElementById('shoppingKart' + deleteId);
            for (let i = 0; i < shopTable.childNodes.length; i++){
                if (shopTable.childNodes[i] === deleteItem) {
                    shopTable.deleteRow(i-1);
                }
            }
        }



        //create new item
        function showCreateModal(){
            $('#createArticleModal').modal('show');
        }

        function saveArticle(){
           if (validation())
           {
                document.getElementById('articleSaveForm').submit();
           }
        }

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
            else if (!articlePrice.match('^[0-9]*$')){
                alert('Der Preis muss eine Zahl sein');
                console.log('Number Fail');
                return false
            }
            else if (parseInt(articlePrice) < 0){
                alert("Der Preis muss größer als 0€ sein!");
                console.log("Price fail")
                return false;
            }
            else
                return true;
        }
    </script>
@endsection
