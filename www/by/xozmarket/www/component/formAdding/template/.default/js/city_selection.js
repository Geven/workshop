$(document).ready(function(){
    var Brestskaya = [{ display : 'Антополь', value : 'Antopol'},
    {display : 'Барановичи', value : 'Baranovichi'},
    {display : 'Белоозерск', value:'Beloozersk'},
    {display : 'Береза', value:'Bereza'},
    {display : 'Береза картуска', value:'Bereza kartuska'},
    {display : 'Брест', value:'Brest'},
    {display : 'Высокое', value:'Vysokoe'},
    {display : 'Ганцевичи', value:'Gancevichi'},
    {display : 'Давид Городок', value:'David gorodok'},
    {display : 'Дрогочин', value:'Dragochin'},
    {display : 'Жабинка', value:'Zhabinka'},
    {display : 'Ивацевичи', value:'Ivacevichi'},
    {display : 'Каменец', value:'Kamenec'},
    {display : 'Кобрин', value:'Kobrin'},
    {display : 'Лунинец', value:'Luninec'},
    {display : 'Ляховичи', value:'Lyahovichi'},
    {display : 'Малорита', value:'Malorita'},
    {display : 'Пружаны', value:'Pruzhany'},
    {display : 'Столин', value:'Stolin'},
    {display : 'Пинск', value:'Pinsk'},];

    var Vitebskaya = [{ display : 'Барань', value : 'Baran'},
    {display : 'Бегомель', value : 'Begoml'},
    {display : 'Бешенковичи', value : 'Beshenkovichi'},
    {display : 'Браслав', value : 'Braslav'},
    {display : 'Витебск', value : 'Vitebsk'},
    {display : 'Воропаево', value : 'Voropaevo'},
    {display : 'Глубокое', value : 'Glubokoe'},
    {display : 'Городок', value : 'Gorodok'},
    {display : 'Дисна', value : 'Disna'},
    {display : 'Докшыцы', value : 'Dоk'},
    {display : 'Друя', value : 'Drya'},
    {display : 'Дубровно', value : 'Dubrovno'},
    {display : 'Лепель', value : 'Lepel'},
    {display : 'Лиозно', value : 'Liozno'},
    {display : 'Миоры', value : 'Miori'},
    {display : 'Новополоцк', value : 'Novopolotsk'},
    {display : 'Орша', value : 'Orsha'},
    {display : 'Полоцк', value : 'Polotsk'},
    {display : 'Поставы', value : 'Postavi'},
    {display : 'Россоны', value : 'Rossoni'},
    {display : 'Сенно', value : 'Senno'},
    {display : 'Толочин', value : 'Tolochin'},
    {display : 'Ушачи', value : 'Ushachi'},
    {display : 'Чашники', value : 'Chushniki'},
    {display : 'Шарковщина', value : 'Sharkovshina'},
    {display : 'Шумилино', value : 'Shumilino'}];

    var Gomelskaya = [{ display : 'Большевик', value : 'Bolshevik'},
        {display : 'Брагин', value : 'Bragin'},
        {display : 'Буда Кошелево', value : 'Buda Koshelevo'},
        {display : 'Василевичи', value : 'Vuselavechi'},
        {display : 'Ветка', value : 'Vetka'},
        {display : 'Гомель', value : 'Gomel'},
        {display : 'Добруш', value : 'Dobrush'},
        {display : 'Ельск', value : 'Elsk'},
        {display : 'Житковичи', value : 'Zhitkovichi'},
        {display : 'Жлобин', value : 'Zhlobin'},
        {display : 'Калинковичи', value : 'Kalinkovichi'},
        {display : 'Корма', value : 'Korma'},
        {display : 'Лельчыцы', value : 'Lelchici'},
        {display : 'Лоев', value : 'Loev'},
        {display : 'Мозырь', value : 'Mozir'},
        {display : 'Наровля', value : 'Naroyla'},
        {display : 'Октябрьский', value : 'Oktyabrskiy'},
        {display : 'Петриков', value : 'Petrikov'},
        {display : 'Речица', value : 'Rechitsa'},
        {display : 'Рогачев', value : 'Rogachou'},
        {display : 'Светлогорск', value : 'Svetlogorsk'},
        {display : 'Хойники', value : 'Hoiniki'},
        {display : 'Чечерск', value : 'Checersk'}
       ];

    var Grodnenskaya = [{ display : 'Большая Берестовица', value : 'Bolshaya Berestovica'},
        {display : 'Волковыск', value : 'Volkovysk'},
        {display : 'Вороново', value : 'Voronovo'},
        {display : 'Гродно', value : 'Grodno'},
        {display : 'Дятлово', value : 'Dyatlovo'},
        {display : 'Зельва', value : 'Zelva'},
        {display : 'Ивье', value : 'Ivye'},
        {display : 'Козловщина', value : 'Kozlovchina'},
        {display : 'Кореличи', value : 'Кореличи'},
        {display : 'Лида', value : 'Lida'},
        {display : 'Мосты', value : 'Mosti'},
        {display : 'Новогрудок', value : 'Novogrudok'},
        {display : 'Островец', value : 'Ostrovec'},
        {display : 'Ошмяны', value : 'Oshmyani'},
        {display : 'Свислочь', value : 'Slisloch'},
        {display : 'Слоним', value : 'Slonim'},
        {display : 'Сморгонь', value : 'Smorgon'},
        {display : 'Щучин', value : 'Shuchin'}
    ];

    var Minskaya = [{ display : 'Березино', value : 'Berezino'},
        {display : 'Бобр', value : 'Bobr'},
        {display : 'Борисов', value : 'Borisov'},
        {display : 'Вилейка', value : 'Vileika'},
        {display : 'Воложин', value : 'Volozhin'},
        {display : 'Городея', value : 'Gorodeya'},
        {display : 'Дзержинск', value : 'Dzerzinsk'},
        {display : 'Жодино', value : 'Zhodino'},
        {display : 'Заславль', value : 'Zaslavl'},
        {display : 'Ивенец', value : 'Ivenets'},
        {display : 'Клецк', value : 'Kletsk'},
        {display : 'Копыль', value : 'Kopil'},
        {display : 'Крупки', value : 'Krypki'},
        {display : 'Логойск', value : 'Logoisk'},
        {display : 'Марьина Горка', value : 'Marina Gorka'},
        {display : 'Молодечно', value : 'Molodechno'},
        {display : 'Минск', value : 'Minsk'},
        {display : 'Несвиж', value : 'Nesvizh'},
        {display : 'Слуцк', value : 'Slutsk'},
        {display : 'Смолевичи', value : 'Smolevichi'},
        {display : 'Солигорск', value : 'Soligorsk'},
        {display : 'Старые Дороги', value : 'Stariye Dorogi'},
        {display : 'Столбцы', value : 'Stolbci'},
        {display : 'Узда', value : 'Uzda'},
        {display : 'Червень', value : 'Cherven'}
        ];

    var Mogilevskaya = [{ display : 'Белыничи', value : 'Belinichi'},
        {display : 'Бобруйск', value : 'Bobryisk'},
        {display : 'Быхов', value : 'Byhov'},
        {display : 'Глуск', value : 'Glusk'},
        {display : 'Горки', value : 'Gorki'},
        {display : 'Городея', value : 'Gorodeya'},
        {display : 'Елизово', value : 'Elizovo'},
        {display : 'Кировск', value : 'Kirovsk'},
        {display : 'Климовичи', value : 'Klimovichi'},
        {display : 'Кличев', value : 'Klichev'},
        {display : 'Костюковичи', value : 'Kostukovichi'},
        {display : 'Краснополье', value : 'Krasnopolie'},
        {display : 'Кричев', value : 'Krichev'},
        {display : 'Круглое', value : 'Krygloe'},
        {display : 'Могилев', value : 'Mogilev'},
        {display : 'Мстиславль', value : 'Mstislavl'},
        {display : 'Осиповичи', value : 'Osipovichi'},
        {display : 'Славгород', value : 'Slavgorod'},
        {display : 'Хотимск', value : 'Hotimsk'},
        {display : 'Чаусы', value : 'Chausi'},
        {display : 'Чериков', value : 'Cherikov'},
        {display : 'Шклов', value : 'Shklov'}

    ];

    $('#companyRegInput').change(function(){
    var select = $('#companyRegInput option:selected').val();
    switch(select){
    case "Брестская": companyCityInput(Brestskaya);
    break;
    case "Витебская": companyCityInput(Vitebskaya);
    break;
    case "Гомельская": companyCityInput(Gomelskaya);
    break;
    case "Гродненская": companyCityInput(Grodnenskaya);
    break;
    case "Минская": companyCityInput(Minskaya);
    break;
    case "Могилевская": companyCityInput(Mogilevskaya);
    break;
    default:
    $('#companyCityInput').empty();
    $('#companyCityInput').append('<option value="">--Выберите город--</option>');

    }
    });

    function companyCityInput(arr) {
    $("#companyCityInput").empty();
    $("#companyCityInput").append('<option value="">--Выберите город--</option>');
    $(arr).each(function(i) { //to list cities
    $("#companyCityInput").append("<option value=\"" + arr[i].value + "\">" + arr[i].display + "</option>")
    });

  }

});

