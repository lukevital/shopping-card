CREATE TABLE IF NOT EXISTS `product`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(50) NOT NULL,
    `description` TEXT NOT NULL,
    `price` DECIMAL(5,2) NOT NULL,
    `vat` TINYINT UNSIGNED NOT NULL,
    `category_id` TINYINT UNSIGNED NOT NULL
) CHARACTER SET utf8 COLLATE utf8_unicode_ci;

INSERT INTO `product` (`name`, `description`, `price`, `vat`, `category_id`) VALUES
    (
        'Kortez - Mój dom', 
        '"Mój dom" to obrazowa, osadzona w czterech ścianach i 9 aktach historia rozpadu związku. Płytę tworzyli ludzie z najbliższego otoczenia Korteza. Praca nad nią zajęła 18 miesięcy. Producentem, podobnie jak wypadku "Bumeranga" był Olek Świerkot. Większość partii instrumentalnych Kortez nagrał z kolegami ze swojego zespołu (Krzysztof Domański, Kuba Galiński, Lesław Matecki i Marcin Ułanowski). Za teksty odpowiedzialna była Agata Trafalska, która pracowała nad nimi z Kortezem. Pomogli im: Roman Szczepanek (znany z "Bumeranga"), Mateusz Dopieralski (Bitamina) i Maks Kucharski (były współlokator Korteza z duetu Max Fiszer).
        Całości obrazu płyty dopełnia okładka, inspirowana frontem płyty "Blues" zespołu Brekout. Zdjęcie okładkowe zrobił Konrad Prajsnar, najbliższy przyjaciel Korteza. Płytę zapowiada singiel "Dobry moment", który w dzień po premierze trafił do grona najpopularniejszych filmów na polskim YT.',
        33.99,
        8,
        1
    ), (
        'Justin Timberlake - Man Of The Woods',
        'Justin Timberlake, dziesięciokrotny zwycięzca Grammy, czterokrotny zwycięzca statuetek Emmy i jeden z najbardziej cenionych artystów popowych na świecie, powraca z czwartym studyjnym albumem. 
        "Man Of The Woods" to najbardziej ambitny album w karierze Justina Timberlakea, zarówno pod względem brzmieniowym, jak i tekstowym. Justin połączył dźwięki tradycyjnego amerykańskiego rocka z inspiracjami artystami takimi jak The Neptunes, Timbaland, Chris Stapleton i Alicia Keys. 
        Opowieść zawartą na płycie zainspirowała najbliższa rodzina artysty oraz droga, którą Justin przebył od rodzinnego Memphis do miejsca, w którym jest dzisiaj. Płytę promuje singiel "Filthy".',
        39.99,
        8,
        2
    ), (
        'Ania Dąbrowska - The Best Of',
        'Kompilacja największych przebojów zawiera 15 utworów, pokazujących pełen przekrój i ewolucję muzycznego stylu artystki. 
        Listę utworów na "The Best Of" otwierają single z jej avant-popowego, delikatnie elektronicznego debiutu. Znajdziemy na niej także wszystkie przeboje z okresu fascynacji stylem retro – akustyczne, nawiązujące do polskiej muzyki lat 60. i 70. piosenki z "Kilku historii na ten sam temat", nieco bardziej eklektyczne, zagłębiające się raz w estetykę lat 50. ("Nigdy więcej nie tańcz ze mną"), raz w epokę disco ("W spodniach czy w sukience") utwory z jej trzeciego albumu, a także "Bang Bang" z albumu "Ania Movie" z filmowymi piosenkami. 
        Nie zabrakło także utworów z dwóch płyt, na których Ania zwróciła się w kierunku współczesnego popu – bardziej alternatywnej, słodko-gorzkiej "Bawię się świetnie" oraz przebojowej, podwójnie platynowej "Dla naiwnych marzycieli". 
        "The Best Of" zawiera także nigdy dotąd niepublikowany utwór zatytułowany "Z Tobą nie umiem wygrać" oraz "Porady na zdrady (Dreszcze)". 
        Album, ukazuje się na CD oraz limitowanym, podwójnym winylu, który powinien znaleźć się w kolekcji każdego miłośnika polskiej muzyki.',
        36.99,
        23,
        1
    ), (
        'Sting: The Best Of 25 Years',
        'Album z największymi przebojami Stinga, z czasów jego solowej kariery, m.in.: „If You Love Somebody Set Them Free” czy „All This Time”, a także piosenkami, które zdobyły nagrodę Grammy „If I Ever Lose My Faith In You” i „Whenever I Say Your Name” z udziałem Mary J. Blige. Album zawiera także „Never Coming Home” oraz nigdy wcześniej niepublikowane wersje „Message In A Bottle”, „Demolition Man” czy „Heavy Cloud No Rain”.',
        19.99,
        23,
        2
    ), (
        'Depeche Mode - Spirit',
        'Album zbiera znakomite noty od wszystkich, którzy mieli okazję się z nim zapoznać – Magazyn Q uznał go za „jeden z najmocniej naładowanych energią albumów Depeche Mode od lat”.',
        19.99,
        8,
        2
    ), (
        'Queen - The Greatest Hits I, II & III',
        'Zbiór największych przebojów legendarnego zespołu Queen na trzech płytach. Wszystkie utwory zostały na nowo zremasterowane przez legendarnego inżyniera dźwięku Boba Ludwiga.',
        59.99,
        23,
        2
    ), (
        'Kamil Bednarek - Talizman',
        'Piąta produkcja Kamila Bednarka i jego zespołu to moment, w którym 26 - letni wokalista i muzyk, postanowił podzielić się z fanami swoimi utworami z kilku obszarów gatunków muzycznych.
        Płyta "Talizman" różni się od jego dotychczasowej twórczości, powstałe utwory są efektem poszukiwań własnej wrażliwości muzycznej, stanowiąc swoisty talizman Bednarka.',
        39.99,
        8,
        1
    );