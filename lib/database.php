<?php

class Database {

    public static function getList($today, $MiejsceBazy='KRA') {
		return [
			[
				'ID' => 1, 'Initials' => 'BS', 'Name' => 'Bartosz Socha', 'UserID' => 101,
				'Dish' => 'Kotlet schabowy z ziemniakami i mizerią', 'DishID' => 10,
				'Eaten' => 0, 'AnotherProvider' => 0, 'KRA_SystemObiadowy' => 1, 
				'MiejsceBazy' => 'KRA', 'providerName' => 'Bistro u Kasi'
			],
			[
				'ID' => 2, 'Initials' => 'JK', 'Name' => 'Jan Kowalski', 'UserID' => 102,
				'Dish' => 'Spaghetti Bolognese z parmezanem', 'DishID' => 11,
				'Eaten' => 0, 'AnotherProvider' => 0, 'KRA_SystemObiadowy' => 1, 
				'MiejsceBazy' => 'KRA', 'providerName' => 'Trattoria Roma'
			],
			[
				'ID' => 3, 'Initials' => 'AN', 'Name' => 'Anna Nowak', 'UserID' => 103,
				'Dish' => 'Sałatka z kurczakiem, awokado i sosem winegret', 'DishID' => 12,
				'Eaten' => 0, 'AnotherProvider' => 0, 'KRA_SystemObiadowy' => 1, 
				'MiejsceBazy' => 'KRA', 'providerName' => 'Green Bowl'
			],
			[
				'ID' => 4, 'Initials' => 'PW', 'Name' => 'Piotr Wiśniewski', 'UserID' => 104,
				'Dish' => 'Pierogi ruskie z okrasą (10 szt.)', 'DishID' => 13,
				'Eaten' => 0, 'AnotherProvider' => 0, 'KRA_SystemObiadowy' => 1, 
				'MiejsceBazy' => 'KRA', 'providerName' => 'Bistro u Kasi'
			],
			[
				'ID' => 5, 'Initials' => 'MK', 'Name' => 'Maria Kamińska', 'UserID' => 105,
				'Dish' => 'Pizza Margherita (32cm)', 'DishID' => 14,
				'Eaten' => 0, 'AnotherProvider' => 0, 'KRA_SystemObiadowy' => 1, 
				'MiejsceBazy' => 'KRA', 'providerName' => 'Trattoria Roma'
			],
			[
				'ID' => 6, 'Initials' => 'TL', 'Name' => 'Tomasz Lewandowski', 'UserID' => 106,
				'Dish' => 'Bowl z pieczonym łososiem i komosą ryżową', 'DishID' => 15,
				'Eaten' => 0, 'AnotherProvider' => 0, 'KRA_SystemObiadowy' => 1, 
				'MiejsceBazy' => 'KRA', 'providerName' => 'Green Bowl'
			],
			[
				'ID' => 7, 'Initials' => 'KW', 'Name' => 'Katarzyna Wójcik', 'UserID' => 107,
				'Dish' => 'Placek po węgiersku z zestawem surówek', 'DishID' => 16,
				'Eaten' => 0, 'AnotherProvider' => 0, 'KRA_SystemObiadowy' => 1, 
				'MiejsceBazy' => 'KRA', 'providerName' => 'Bistro u Kasi'
			],
			[
				'ID' => 8, 'Initials' => 'MZ', 'Name' => 'Michał Zieliński', 'UserID' => 108,
				'Dish' => 'Lasagne klasyczna z sosem pomidorowym', 'DishID' => 17,
				'Eaten' => 0, 'AnotherProvider' => 0, 'KRA_SystemObiadowy' => 1, 
				'MiejsceBazy' => 'KRA', 'providerName' => 'Trattoria Roma'
			],
			[
				'ID' => 9, 'Initials' => 'AS', 'Name' => 'Agnieszka Szymańska', 'UserID' => 109,
				'Dish' => 'Krem z pieczonych pomidorów z grzankami', 'DishID' => 18,
				'Eaten' => 0, 'AnotherProvider' => 0, 'KRA_SystemObiadowy' => 1, 
				'MiejsceBazy' => 'KRA', 'providerName' => 'Green Bowl'
			],
			[
				'ID' => 10, 'Initials' => 'KW', 'Name' => 'Krzysztof Woźniak', 'UserID' => 110,
				'Dish' => 'Gulasz wieprzowy z kaszą gryczaną', 'DishID' => 19,
				'Eaten' => 0, 'AnotherProvider' => 0, 'KRA_SystemObiadowy' => 1, 
				'MiejsceBazy' => 'KRA', 'providerName' => 'Bistro u Kasi'
			],
			[
				'ID' => 11, 'Initials' => 'MD', 'Name' => 'Magdalena Dąbrowska', 'UserID' => 111,
				'Dish' => 'Risotto z grzybami leśnymi i natką pietruszki', 'DishID' => 20,
				'Eaten' => 0, 'AnotherProvider' => 0, 'KRA_SystemObiadowy' => 1, 
				'MiejsceBazy' => 'KRA', 'providerName' => 'Trattoria Roma'
			],
			[
				'ID' => 12, 'Initials' => 'GK', 'Name' => 'Grzegorz Kozłowski', 'UserID' => 112,
				'Dish' => 'Naleśniki szpinakowe z fetą i suszonymi pomidorami', 'DishID' => 21,
				'Eaten' => 0, 'AnotherProvider' => 0, 'KRA_SystemObiadowy' => 1, 
				'MiejsceBazy' => 'KRA', 'providerName' => 'Green Bowl'
			],
			[
				'ID' => 13, 'Initials' => 'KJ', 'Name' => 'Krystyna Jankowska', 'UserID' => 113,
				'Dish' => 'Zupa domowa pomidorowa z makaronem', 'DishID' => 22,
				'Eaten' => 0, 'AnotherProvider' => 0, 'KRA_SystemObiadowy' => 1, 
				'MiejsceBazy' => 'KRA', 'providerName' => 'Bistro u Kasi'
			],
			[
				'ID' => 14, 'Initials' => 'MM', 'Name' => 'Marek Mazur', 'UserID' => 114,
				'Dish' => 'Spaghetti Carbonara na oryginalnym boczku', 'DishID' => 23,
				'Eaten' => 0, 'AnotherProvider' => 0, 'KRA_SystemObiadowy' => 1, 
				'MiejsceBazy' => 'KRA', 'providerName' => 'Trattoria Roma'
			],
			[
				'ID' => 15, 'Initials' => 'EK', 'Name' => 'Ewa Krawczyk', 'UserID' => 115,
				'Dish' => 'Sałatka z karmelizowanym kozim serem i burakiem', 'DishID' => 24,
				'Eaten' => 0, 'AnotherProvider' => 0, 'KRA_SystemObiadowy' => 1, 
				'MiejsceBazy' => 'KRA', 'providerName' => 'Green Bowl'
			],
			[
				'ID' => 16, 'Initials' => 'KP', 'Name' => 'Kamil Piotrowski', 'UserID' => 116,
				'Dish' => 'Tradycyjny kotlet mielony z purée i buraczkami', 'DishID' => 25,
				'Eaten' => 0, 'AnotherProvider' => 0, 'KRA_SystemObiadowy' => 1, 
				'MiejsceBazy' => 'KRA', 'providerName' => 'Bistro u Kasi'
			],
			[
				'ID' => 17, 'Initials' => 'PG', 'Name' => 'Paulina Grabowska', 'UserID' => 117,
				'Dish' => 'Penne Arrabbiata (pikantne)', 'DishID' => 26,
				'Eaten' => 0, 'AnotherProvider' => 0, 'KRA_SystemObiadowy' => 1, 
				'MiejsceBazy' => 'KRA', 'providerName' => 'Trattoria Roma'
			],
			[
				'ID' => 18, 'Initials' => 'ŁP', 'Name' => 'Łukasz Pawłowski', 'UserID' => 118,
				'Dish' => 'Fit Wrap z grillowanym kurczakiem i hummusem', 'DishID' => 27,
				'Eaten' => 0, 'AnotherProvider' => 0, 'KRA_SystemObiadowy' => 1, 
				'MiejsceBazy' => 'KRA', 'providerName' => 'Green Bowl'
			],
			[
				'ID' => 19, 'Initials' => 'ZM', 'Name' => 'Zofia Michalska', 'UserID' => 119,
				'Dish' => 'Naleśniki z białym serem, śmietaną i owocami (2 szt.)', 'DishID' => 28,
				'Eaten' => 0, 'AnotherProvider' => 0, 'KRA_SystemObiadowy' => 1, 
				'MiejsceBazy' => 'KRA', 'providerName' => 'Bistro u Kasi'
			],
			[
				'ID' => 20, 'Initials' => 'MK', 'Name' => 'Maciej Król', 'UserID' => 120,
				'Dish' => 'Pizza Capricciosa (szynka, pieczarki, 32cm)', 'DishID' => 29,
				'Eaten' => 0, 'AnotherProvider' => 0, 'KRA_SystemObiadowy' => 1, 
				'MiejsceBazy' => 'KRA', 'providerName' => 'Trattoria Roma'
			],
			[
				'ID' => 21, 'Initials' => 'BW', 'Name' => 'Barbara Wieczorek', 'UserID' => 121,
				'Dish' => 'Sałatka Cezar z chrupiącymi grzankami', 'DishID' => 30,
				'Eaten' => 0, 'AnotherProvider' => 0, 'KRA_SystemObiadowy' => 1, 
				'MiejsceBazy' => 'KRA', 'providerName' => 'Green Bowl'
			],
			[
				'ID' => 22, 'Initials' => 'JJ', 'Name' => 'Jakub Jabłoński', 'UserID' => 122,
				'Dish' => 'Gołąbki w lekkim sosie pomidorowym (2 szt.)', 'DishID' => 31,
				'Eaten' => 0, 'AnotherProvider' => 0, 'KRA_SystemObiadowy' => 1, 
				'MiejsceBazy' => 'KRA', 'providerName' => 'Bistro u Kasi'
			],
			[
				'ID' => 23, 'Initials' => 'MD', 'Name' => 'Monika Dudek', 'UserID' => 123,
				'Dish' => 'Gnocchi z sosem gorgonzola i orzechami włoskimi', 'DishID' => 32,
				'Eaten' => 0, 'AnotherProvider' => 0, 'KRA_SystemObiadowy' => 1, 
				'MiejsceBazy' => 'KRA', 'providerName' => 'Trattoria Roma'
			],
			[
				'ID' => 24, 'Initials' => 'AM', 'Name' => 'Adam Majewski', 'UserID' => 124,
				'Dish' => 'Sałatka grecka z oryginalną fetą i oliwkami Kalamata', 'DishID' => 33,
				'Eaten' => 0, 'AnotherProvider' => 0, 'KRA_SystemObiadowy' => 1, 
				'MiejsceBazy' => 'KRA', 'providerName' => 'Green Bowl'
			],
			[
				'ID' => 25, 'Initials' => 'KS', 'Name' => 'Karolina Stępień', 'UserID' => 125,
				'Dish' => 'Rolada śląska z kluskami i modrą kapustą', 'DishID' => 34,
				'Eaten' => 0, 'AnotherProvider' => 0, 'KRA_SystemObiadowy' => 1, 
				'MiejsceBazy' => 'KRA', 'providerName' => 'Bistro u Kasi'
			],
			[
				'ID' => 26, 'Initials' => 'DG', 'Name' => 'Dawid Górski', 'UserID' => 126,
				'Dish' => 'Klasyczne Tiramisu', 'DishID' => 35,
				'Eaten' => 0, 'AnotherProvider' => 0, 'KRA_SystemObiadowy' => 1, 
				'MiejsceBazy' => 'KRA', 'providerName' => 'Trattoria Roma'
			],
			[
				'ID' => 27, 'Initials' => 'NS', 'Name' => 'Natalia Sikora', 'UserID' => 127,
				'Dish' => 'Krem z białych warzyw z prażonymi pestkami dyni', 'DishID' => 36,
				'Eaten' => 0, 'AnotherProvider' => 0, 'KRA_SystemObiadowy' => 1, 
				'MiejsceBazy' => 'KRA', 'providerName' => 'Green Bowl'
			],
			[
				'ID' => 28, 'Initials' => 'SW', 'Name' => 'Szymon Walczak', 'UserID' => 128,
				'Dish' => 'Tradycyjny żurek na zakwasie z jajkiem i kiełbasą', 'DishID' => 37,
				'Eaten' => 0, 'AnotherProvider' => 0, 'KRA_SystemObiadowy' => 1, 
				'MiejsceBazy' => 'KRA', 'providerName' => 'Bistro u Kasi'
			],
			[
				'ID' => 29, 'Initials' => 'WB', 'Name' => 'Weronika Baran', 'UserID' => 129,
				'Dish' => 'Ravioli ze szpinakiem, ricottą i masłem szałwiowym', 'DishID' => 38,
				'Eaten' => 0, 'AnotherProvider' => 0, 'KRA_SystemObiadowy' => 1, 
				'MiejsceBazy' => 'KRA', 'providerName' => 'Trattoria Roma'
			],
			[
				'ID' => 30, 'Initials' => 'AR', 'Name' => 'Artur Rutkowski', 'UserID' => 130,
				'Dish' => 'Wegańskie żółte curry z ciecierzycą i mlekiem kokosowym', 'DishID' => 39,
				'Eaten' => 0, 'AnotherProvider' => 0, 'KRA_SystemObiadowy' => 1, 
				'MiejsceBazy' => 'KRA', 'providerName' => 'Green Bowl'
			]
		];
	}

    public static function buildNewsData() {
        return [
            [
                'Date' => new DateTime('today'),
                'Time' => '12:00',
                'Subject' => 'Szkolenie z bezpieczeństwa IT',
                'Description' => 'Obowiązkowe szkolenie dla wszystkich pracowników działu technicznego.'
            ],
            [
                'Date' => new DateTime('tomorrow'),
                'Time' => '14:30',
                'Subject' => 'Aktualizacja wewnętrznej aplikacji',
                'Description' => 'Wdrażanie nowej wersji systemu z użyciem Tailwind CSS.'
            ],
            [
                'Date' => new DateTime('+2 days'),
                'Time' => '09:00',
                'Subject' => 'Przerwa techniczna - sieć lokalna',
                'Description' => 'Możliwe chwilowe przerwy w dostępie do internetu na piętrze 2.'
            ]
        ];
    }

}