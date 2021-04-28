<div id="jsMenu">

</div>



<script type="text/javascript">
    let menu = {
        mainPoints:
        [
            {name:'Home',ref:'articles',sub:0},
            {name:'Kategorien',ref:'categories',sub:0},
            {name:'Verkauf',ref:'verkauf',sub: 0},
            {name:'Unternehmen',ref:'',sub:1},
        ],
        subs:
        [
            {name:'Karriere',ref:'karriere',subFrom:'Unternehmen'},
            {name:'Philosophie',ref:'philosophie',subFrom:'Unternehmen'},

        ],
    }



    //build menu

    //ul
    let ul = document.createElement('ul');

    document.getElementById('jsMenu').appendChild(ul);
    ul.classList.add('nav');
    ul.classList.add('flex-column');

    //li
    menu.mainPoints.forEach(function (item){
        let li = document.createElement('li');
        ul.appendChild(li);
        li.classList.add('nav-item');
        //a
        let a = document.createElement('a');
        li.appendChild(a);
        a.classList.add('nav-link');
        a.id += item.name;
        a.href += item.ref;
        a.innerHTML += item.name;
        if (item.sub == 1)
        {
            menu.subs.forEach(function (subItem){
                if (subItem.subFrom === item.name)
                {
                    let ull = document.createElement('ul');
                    a.after(ull);
                    let lii = document.createElement('li');
                    ull.appendChild(lii);
                    lii.classList.add('nav-item');
                    let aa = document.createElement('a');
                    lii.appendChild(aa);

                    aa.href += subItem.ref;
                    aa.innerHTML += subItem.name;
                }

            })
        }
    })
</script>
