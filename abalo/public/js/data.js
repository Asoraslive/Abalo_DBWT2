var data = {
    'produkte': [
        { name: 'Ritterburg', preis: 59.99, kategorie: 1, anzahl: 3 },
        { name: 'Gartenschlau 10m', preis: 6.50, kategorie: 2, anzahl: 5 },
        { name: 'Robomaster' ,preis: 199.99, kategorie: 1, anzahl: 2 },
        { name: 'Pool 250x400', preis: 250, kategorie: 2, anzahl: 8 },
        { name: 'Rasenmähroboter', preis: 380.95, kategorie: 2, anzahl: 4 },
        { name: 'Prinzessinnenschloss', preis: 59.99, kategorie: 1, anzahl: 5 }
    ],
    'kategorien': [
        { id: 1, name: 'Spielzeug' },
        { id: 2, name: 'Garten' }
    ]
};
console.log("Max Preis Name: " + getMaxPreis());
console.log("Min Preis Objekt: "+ JSON.stringify(getMinPreisProdukt()))
console.log("Gesamtsumme aller Produkte: " + getPreisSum())
console.log("Wert aller Produkte: "+ getGesamtWert(data.produkte))
console.log("Anzahl aller Produkte mit der Kategorie Spielzeug: "+ getAnzahlProdukteOfKategorie(data.produkte,'Spielzeug'))
console.log("Anzahl aller Produkte mit der Kategorie Garten: "+ getAnzahlProdukteOfKategorie(data.produkte,'Garten'))

function getMaxPreis(){
    let res = [];
    data.produkte.forEach(element => {
        if( res.length === 0 || element.preis > res[0].preis)
            res[0]=element;
    })
    return res[0].name;
}

function getMinPreisProdukt(){
    let res = [];
    data.produkte.forEach(element => {
        if( res.length === 0 || element.preis < res[0].preis)
            res[0]=element;
    })
    return res[0];
}

function getPreisSum(){
    let res = 0.0;
    data.produkte.forEach(element => {
        res += element.preis;
    })
    return res;
}

function getGesamtWert(prod){
    let res=0;
    prod.forEach(element => {
        res += (element.preis*element.anzahl);
    })
    return res;
}

function getAnzahlProdukteOfKategorie(prod,kat){
    let res = 0;
    //find id
    let katId = 0;
    data.kategorien.forEach(element => { if (element.name === kat) katId = element.id;})

    prod.forEach(element => {
        if( element.kategorie === katId)
            res += element.anzahl;
    })
    return res;
}

