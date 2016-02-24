
// ---------
// Paths
// ---------

function Path(town1, town2, path_d, path_stroke_dasharray, nbOfTrains, color, svg_tagname) {
    this.towns = [town1, town2];
    this.numberOfTrains = nbOfTrains;
    this.color = color;
    this.ui = document.createElementNS('http://www.w3.org/2000/svg', svg_tagname);
    this.ui.model = this;
    this.ui.setAttribute('class', 'path ' + 'path_' + this.color);
    this.ui.setAttribute('stroke-dasharray', path_stroke_dasharray);
}

function BezierPath(town1, town2, path_d, path_stroke_dasharray, nbOfTrains, color) {
    // copying existing arguments list
    var newArgs = Array.prototype.slice.call(arguments);

    // and adding new elem
    newArgs.push('path');

    // call to parent constructor
    Path.apply(this, newArgs);

    // path_d = 'M62,171 Q179,189 265,392'	
    this.ui.setAttribute('d', path_d);

}

function PolylinePath(town1, town2, path_d, path_stroke_dasharray, nbOfTrains, color) {

    // copying existing arguments list
    var newArgs = Array.prototype.slice.call(arguments);

    // and adding new elem
    newArgs.push('polyline');

    // call to parent constructor	
    Path.apply(this, newArgs);

    // path_d = '164,412 130,418 115,454'
    this.ui.setAttribute('points', path_d);
}

function initAllPaths() {
    var allPaths = [];

    allPaths.push(new PolylinePath('Vancouver', 'Calgary',
            '85,58 192,47', '25,12', 3, 'transparent'));
    allPaths.push(new PolylinePath('Vancouver', 'Seattle',
            '72,102 72,75', '24,12', 1, 'transparent'));
    allPaths.push(new PolylinePath('Vancouver', 'Seattle',
            '58,102 58,75', '24,12', 1, 'transparent'));
    allPaths.push(new BezierPath('Calgary', 'Seattle',
            'M83,116 Q180,127 200,51', '25,12.6', 4, 'transparent'));
    allPaths.push(new BezierPath('Calgary', 'Winnipeg',
            'M216,42 Q323,-4 420,46', '25,12', 6, 'white'));
    allPaths.push(new PolylinePath('Calgary', 'Helena',
            '213,60 300,161', '25,11.6', 4, 'transparent'));
    allPaths.push(new PolylinePath('Winnipeg', 'Helena',
            '319,162 417,66', '24.8,11.8', 4, 'blue'));
    allPaths.push(new PolylinePath('Winnipeg', 'Duluth',
            '440,68 540,162', '24.8,11.8', 4, 'black'));
    allPaths.push(new PolylinePath('Winnipeg', 'Sault St Marie',
            '456,56 658,97', '24.8,11.8', 6, 'transparent'));
    allPaths.push(new PolylinePath('Sault St Marie', 'Duluth',
            '569,154 662,115', '24.8,11.8', 3, 'transparent'));
    allPaths.push(new BezierPath('Sault St Marie', 'Montréal',
            'M690,94 Q757,36 852,37.5', '24.9,11.9', 5, 'black'));
    allPaths.push(new PolylinePath('Sault St Marie', 'Toronto',
            '697.5,109 758,121', '24.8,11.8', 2, 'transparent'));
    allPaths.push(new PolylinePath('Montréal', 'Boston',
            '882,56 931,95', '25,11.8', 2, 'transparent'));
    allPaths.push(new PolylinePath('Montréal', 'Boston',
            '890,46 941,87', '25,11.8', 2, 'transparent'));
    allPaths.push(new BezierPath('Montréal', 'Toronto',
            'M785,112 Q806,66 861,48', '25,11.8', 3, 'transparent'));
    allPaths.push(new PolylinePath('Montréal', 'New York',
            '867.5,61 884,160', '24.6,12', 3, 'blue'));
    allPaths.push(new PolylinePath('Seattle', 'Portland',
            '53,157 63,135', '24,12', 1, 'transparent'));
    allPaths.push(new PolylinePath('Seattle', 'Portland',
            '41,153 54,123', '25,12', 1, 'transparent'));
    allPaths.push(new PolylinePath('Seattle', 'Helena',
            '80,132 285,177', '25,12', 6, 'yellow'));
    allPaths.push(new PolylinePath('Helena', 'Duluth',
            '321.5,177 537,174', '24.8,12', 6, 'orange'));
    allPaths.push(new PolylinePath('Helena', 'Salt Lake City',
            '243,277 294,192', '24,13', 3, 'pink'));
    allPaths.push(new PolylinePath('Helena', 'Denver',
            '311,192 364,319', '24,11.6', 4, 'green'));
    allPaths.push(new PolylinePath('Helena', 'Omaha',
            '331,192 491,255', '24.8,12', 5, 'brown'));
    allPaths.push(new PolylinePath('Duluth', 'Omaha',
            '511,245 536,184', '25,11.8', 2, 'transparent'));
    allPaths.push(new PolylinePath('Duluth', 'Omaha',
            '523,250 548,189', '25,11.8', 2, 'transparent'));
    allPaths.push(new BezierPath('Duluth', 'Chicago',
            'M558,184 Q600,209 655,219', '24.9,12', 3, 'brown'));
    allPaths.push(new PolylinePath('Duluth', 'Toronto',
            '562,169 770,135', '24.8,11.8', 6, 'pink'));
    allPaths.push(new PolylinePath('Toronto', 'Chicago',
            '668,213 690,191 719,171.5 756,160 785,139', '25,12', 4, 'white'));
    allPaths.push(new PolylinePath('Toronto', 'Pittsburg',
            '799.5,202 795.5,137', '24.8,12.2', 2, 'transparent'));
    allPaths.push(new PolylinePath('Boston', 'New York',
            '901,161 938,104', '23.5,11.3', 2, 'yellow'));
    allPaths.push(new PolylinePath('Boston', 'New York',
            '912,169 946,114', '24,11.8', 2, 'brown'));
    allPaths.push(new BezierPath('Portland', 'San Francisco',
            'M33,348  Q6,266 43,185', '23,13', 3, 'pink'));
    allPaths.push(new BezierPath('Portland', 'San Francisco',
            'M20,347 Q-9,266 32,176', '24,12', 3, 'green'));
    allPaths.push(new BezierPath('Portland', 'Salt Lake City',
            'M59,172  Q173,192 224,285', '24,13', 6, 'blue'));
    allPaths.push(new PolylinePath('Salt Lake City', 'San Francisco',
            '48,352 210,299', '25,11', 5, 'orange'));
    allPaths.push(new PolylinePath('Salt Lake City', 'San Francisco',
            '52,364 216,311', '25,11.2', 5, 'white'));
    allPaths.push(new PolylinePath('Salt Lake City', 'Denver',
            '247,296 347,315', '25,12', 3, 'brown'));
    allPaths.push(new PolylinePath('Salt Lake City', 'Denver',
            '244,309 344,327', '25.4,12', 3, 'yellow'));
    allPaths.push(new BezierPath('Salt Lake City', 'Las Vegas',
            'M229,317 Q232,368 182,409', '25,13', 3, 'orange'));
    allPaths.push(new BezierPath('Denver', 'Omaha',
            'M375,319 Q426,277 502,268', '24.8,12', 4, 'pink'));
    allPaths.push(new BezierPath('Denver', 'Kansas City',
            'M386,332 Q458,341 523,311', '25.2,11.8', 4, 'black'));
    allPaths.push(new BezierPath('Denver', 'Kansas City',
            'M385,345 Q460,354 523,325', '25.6,11.8', 4, 'orange'));
    allPaths.push(new BezierPath('Denver', 'Phoenix',
            'M235,462 Q285,345 352,338', '24.5,11.9', 5, 'white'));
    allPaths.push(new PolylinePath('Santa Fe', 'Denver',
            '355,409 359,345', '24,11.8', 2, 'transparent'));
    allPaths.push(new BezierPath('Denver', 'Oklahoma City',
            'M373,352 Q398,396 500,397', '25.6,11.8', 4, 'brown'));
    allPaths.push(new PolylinePath('Omaha', 'Chicago',
            '530,262 587,223 656,233', '25.4,12.4', 4, 'blue'));
    allPaths.push(new PolylinePath('Omaha', 'Kansas City',
            '528,303 516,278', '25,11.8', 1, 'transparent'));
    allPaths.push(new PolylinePath('Omaha', 'Kansas City',
            '540,298 528,273', '25,11.8', 1, 'transparent'));
    allPaths.push(new BezierPath('Chicago', 'Pittsburg',
            'M684,217.5 Q746,200 785,206', '25,11.8', 3, 'orange'));
    allPaths.push(new BezierPath('Chicago', 'Pittsburg',
            'M689,230 Q751,212 790,219', '25,11.8', 3, 'black'));
    allPaths.push(new PolylinePath('Chicago', 'Saint Louis',
            '620.5,296 655.5,244', '25,11.8', 2, 'green'));
    allPaths.push(new PolylinePath('Chicago', 'Saint Louis',
            '631.5,303.5 668,249', '25,11.8', 2, 'white'));
    allPaths.push(new PolylinePath('Pittsburg', 'New York',
            '817,203 875,169', '25.2,12', 2, 'white'));
    allPaths.push(new PolylinePath('Pittsburg', 'New York',
            '823,214 880,181', '25.2,12', 2, 'green'));
    allPaths.push(new PolylinePath('Pittsburg', 'Saint Louis',
            '640,317 792,232', '25.1,11.7', 5, 'green'));
    allPaths.push(new PolylinePath('Pittsburg', 'Nashville',
            '712,342 727,315 750,286 782,267 805,235', '24.7,12.2', 4, 'yellow'));
    allPaths.push(new PolylinePath('Pittsburg', 'Raleigh',
            '829,305 815,242', '24.8,12.2', 2, 'transparent'));
    allPaths.push(new PolylinePath('Pittsburg', 'Washington',
            '825,230 884,260', '25,11.8', 2, 'transparent'));
    allPaths.push(new PolylinePath('New York', 'Washington',
            '894,250 890,187', '24,11.8', 2, 'orange'));
    allPaths.push(new PolylinePath('New York', 'Washington',
            '907,249 903,186', '24,11.8', 2, 'black'));
    allPaths.push(new PolylinePath('Kansas City', 'Saint Louis',
            '550.5,307 614,305.5', '25.2,11.8', 2, 'blue'));
    allPaths.push(new PolylinePath('Kansas City', 'Saint Louis',
            '550.5,320 614,318.5', '25.2,11.8', 2, 'pink'));
    allPaths.push(new PolylinePath('Kansas City', 'Oklahoma City',
            '515,386 534,324', '24.3,11.8', 2, 'transparent'));
    allPaths.push(new PolylinePath('Kansas City', 'Oklahoma City',
            '528,390 546,328', '24.3,11.8', 2, 'transparent'));
    allPaths.push(new PolylinePath('Saint Louis', 'Nashville',
            '639,334 702,352', '25,11.8', 2, 'transparent'));
    allPaths.push(new PolylinePath('Saint Louis', 'Little Rock',
            '609,389 625,328', '25,11.8', 2, 'transparent'));
    allPaths.push(new PolylinePath('Nashville', 'Atlanta',
            '733,362.5 759,380', '25.6,11.8', 1, 'transparent'));
    allPaths.push(new BezierPath('Nashville', 'Raleigh',
            'M732,345 Q781,309 836,323', '25.8,12', 3, 'black'));
    allPaths.push(new BezierPath('Nashville', 'Little Rock',
            'M623,403 Q681,402 718,359', '25.4,11.8', 3, 'white'));
    allPaths.push(new PolylinePath('Atlanta', 'Raleigh',
            '779,376 828,335', '24.8,11.8', 2, 'transparent'));
    allPaths.push(new PolylinePath('Atlanta', 'Raleigh',
            '789,385 837,343', '24.1,11.8', 2, 'transparent'));
    allPaths.push(new PolylinePath('Atlanta', 'Charleston',
            '792,400 858,403', '25.3,11.8', 2, 'transparent'));
    allPaths.push(new PolylinePath('Atlanta', 'Miami',
            '781,410 890,542', '24.6,11.6', 5, 'blue'));
    allPaths.push(new BezierPath('Atlanta', 'New Orléans',
            'M678,500 Q702,436 760,392', '24.7,11.8', 4, 'yellow'));
    allPaths.push(new BezierPath('Atlanta', 'New Orléans',
            'M688,510 Q711,445 774,398', '24.3,11.9', 4, 'orange'));
    allPaths.push(new PolylinePath('Raleigh', 'Washington',
            '846,318 888,269', '25,11.8', 2, 'transparent'));
    allPaths.push(new PolylinePath('Raleigh', 'Washington',
            '856,326 898,277', '25,11.8', 2, 'transparent'));
    allPaths.push(new PolylinePath('Raleigh', 'Charleston',
            '852,341 883,361 874,383', '24,14', 2, 'transparent'));
    allPaths.push(new BezierPath('Charleston', 'Miami',
            'M903,537 Q867,477 870,406', '24.4,11.8', 4, 'pink'));
    allPaths.push(new PolylinePath('Little Rock', 'Oklahoma City',
            '533,402 599,400', '24.8,11.8', 2, 'transparent'));
    allPaths.push(new PolylinePath('Little Rock', 'Dallas',
            '557,466 595,414', '24.8,11.8', 2, 'transparent'));
    allPaths.push(new PolylinePath('Little Rock', 'New Orléans',
            '616,417 665,506', '25,11.8', 3, 'green'));
    allPaths.push(new PolylinePath('Oklahoma City', 'Santa Fe',
            '373,423 478,410', '25.6,11.8', 3, 'blue'));
    allPaths.push(new BezierPath('Oklahoma City', 'El Paso',
            'M366,505 Q467,478 507,404', '24.8,12', 6, 'yellow'));
    allPaths.push(new PolylinePath('Oklahoma City', 'Dallas',
            '528,475 520,412', '23.4,11.8', 1, 'transparent'));
    allPaths.push(new PolylinePath('Oklahoma City', 'Dallas',
            '541,474 533,411', '23.8,11.8', 1, 'transparent'));
    allPaths.push(new PolylinePath('Santa Fe', 'Phoenix',
            '251,466 344,426', '25,11.8', 3, 'transparent'));
    allPaths.push(new PolylinePath('Santa Fe', 'El Paso',
            '351,497 355,433', '24.2,11.8', 2, 'transparent'));
    allPaths.push(new PolylinePath('Las Vegas', 'Los Angeles',
            '158,412 126,418 110,452', '25,17', 2, 'transparent'));
    allPaths.push(new BezierPath('San Francisco', 'Los Angeles',
            'M96,454 Q58,422 42,376', '24,12', 3, 'pink'));
    allPaths.push(new BezierPath('San Francisco', 'Los Angeles',
            'M86,463 Q50,432 28,378', '25,12', 3, 'yellow'));
    allPaths.push(new BezierPath('Los Angeles', 'Phoenix',
            'M121,462 Q177,452 228,468', '24.8,12', 3, 'transparent'));
    allPaths.push(new BezierPath('Los Angeles', 'El Paso',
            'M123,479 Q210,545 326,517', '25,12', 6, 'black'));
    allPaths.push(new PolylinePath('Phoenix', 'El Paso',
            '243,480 341,508', '25,11.8', 3, 'transparent'));
    allPaths.push(new PolylinePath('El Paso', 'Dallas',
            '385,515 523,494', '25,11.8', 4, 'brown'));
    allPaths.push(new BezierPath('El Paso', 'Houston',
            'M362,523 Q463,580 569,537', '24.9,12', 6, 'green'));
    allPaths.push(new PolylinePath('Dallas', 'Houston',
            '560,520 539,497', '23.8,11.8', 1, 'transparent'));
    allPaths.push(new PolylinePath('Dallas', 'Houston',
            '571,512 550,490', '24,11.8', 1, 'transparent'));
    allPaths.push(new PolylinePath('Houston', 'New Orléans',
            '594,526 662,515.5', '25.6,11.8', 2, 'transparent'));
    allPaths.push(new BezierPath('New Orléans', 'Miami',
            'M701,517 Q805,449 886,559', '24.8,12.4', 6, 'brown'));





    return allPaths;
}

// ---------
// Utils
// ---------	
function toggleClassOfSVGElement(elem, className) {
    if (elem.classList.contains(className))
        elem.classList.remove(className);
    else
        elem.classList.add(className);
}

// ---------
// Main
// ---------

jQuery(function ($) {

    var $svg = $('#svg_board');
    var svg = $svg[0];

    // init all paths array	
    var allPaths = initAllPaths();
    var Players = $('#game').data('players');
    var coupJoues = $('#game').data('coupjoues');
    var currentPlayerIndex = $('#game').data('currentplayer');
    var moiIndex = $('#game').data('moi');

    var allPlayers = [];
    $.each(Players, function (index, infos) {
        allPlayers[infos.id] = Players[infos.id].couleur;
    });//***********************************************Il ne faut ajouter que pour les bon ids

    var currentPlayer = Players[currentPlayerIndex];
    var moi = Players[moiIndex];

    $.each(allPaths, function (index, path) {
        svg.appendChild(path.ui);
        var assezDeCartes = (path.color === "blue" && (currentPlayer.bleu + currentPlayer.locomotive) >= path.numberOfTrains)
                || (path.color === "black" && (currentPlayer.noir + currentPlayer.locomotive) >= path.numberOfTrains)
                || (path.color === "white" && (currentPlayer.blanc + currentPlayer.locomotive) >= path.numberOfTrains)
                || (path.color === "yellow" && (currentPlayer.jaune + currentPlayer.locomotive) >= path.numberOfTrains)
                || (path.color === "pink" && (currentPlayer.rose + currentPlayer.locomotive) >= path.numberOfTrains)
                || (path.color === "orange" && (currentPlayer.orange + currentPlayer.locomotive) >= path.numberOfTrains)
                || (path.color === "brown" && (currentPlayer.rouge + currentPlayer.locomotive) >= path.numberOfTrains)
                || (path.color === "green" && (currentPlayer.vert + currentPlayer.locomotive) >= path.numberOfTrains)
                || (path.color === "transparent" && (currentPlayer.max + currentPlayer.locomotive) >= path.numberOfTrains);
        if ((moiIndex === currentPlayerIndex) && (assezDeCartes)) {
            toggleClassOfSVGElement(path.ui, 'path_clickable');            
        }

        this.ui.setAttribute('no', index);

        $.each(coupJoues, function (chemin, couleur) {
            if (path.ui.getAttribute("no") == chemin) {
                if ((moiIndex === currentPlayerIndex) && (assezDeCartes))
                    toggleClassOfSVGElement(path.ui, 'path_clickable');
                toggleClassOfSVGElement(path.ui, couleur);
                toggleClassOfSVGElement(path.ui, 'path_selected');
            }
        });


    });

    // turn of the first player
    toggleClassOfSVGElement(svg, allPlayers[currentPlayerIndex]);
    $('#currentPlayer').html("Au tour de " + currentPlayer.name);
    $('#rouge').html(moi.rouge);
    $('#rose').html(moi.rose);
    $('#vert').html(moi.vert);
    $('#noir').html(moi.noir);
    $('#bleu').html(moi.bleu);
    $('#blanc').html(moi.blanc);
    $('#orange').html(moi.orange);
    $('#jaune').html(moi.jaune);
    $('#locomotive').html(moi.locomotive);
    $('#wagon').html(moi.wagons);
    $('#score').html(moi.score);

    // make only path_clickable clikable thanks to event bubbling
    $("#svg_board").on("click", ".path_clickable", function () {

        $.post('index.php?controller=game&user=1&action=jouer', {dernier_chemin: this.getAttribute("no")}, function (data) {
            $('#page').html(data);
        });

    });

});
