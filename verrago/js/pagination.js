const list_items = [
    {
        id: '1',
        titre: 'Pompe et accessoires',
        image: ''
    }, {
        id: '1',
        titre: 'Robinetterie industrielle',
        image: ''
    }, {
        id: '1',
        titre: 'Tuyaux et Flexibles',
        image: ''
    }, {
        id: '1',
        titre: 'Etanchéité industrielle',
        image: ''
    }, {
        id: '1',
        titre: 'Solution ATEX',
        image: ''
    }, {
        id: '1',
        titre: 'Coffret et accessoires de câblage',
        image: ''
    }, {
        id: '1',
        titre: 'Câbles électriques',
        image: ''
    }, {
        id: '1',
        titre: 'Matériel Pompier et Incendie',
        image: ''
    }, {
        id: '1',
        titre: 'Instrumentation : Mesure et Alarme de Niveau',
        image: ''
    }, {
        id: '1',
        titre: 'Tubes et Raccords',
        image: ''
    }, {
        id: '1',
        titre: 'Protection Individuelle',
        image: ''
    }, {
        id: '1',
        titre: 'Inox : Boulonnerie, Tôles, Barres, Tubes, etc.',
        image: ''
    }, {
        id: '1',
        titre: 'Caillebotis',
        image: ''
    }, {
        id: '1',
        titre: 'Enrouleurs de Câble',
        image: ''
    }, {
        id: '1',
        titre: 'Moteurs Electriques',
        image: ''
    }, {
        id: '1',
        titre: 'Balais de Charbon',
        image: ''
    }, {
        id: '1',
        titre: 'Accouplements',
        image: ''
    }, {
        id: '1',
        titre: 'Freins',
        image: ''
    }, {
        id: '1',
        titre: 'Compteurs volumétriques',
        image: ''
    }, {
        id: '1',
        titre: 'Calculateurs électroniques',
        image: ''
    }, {
        id: '1',
        titre: 'Capteurs de détection',
        image: ''
    }, {
        id: '1',
        titre: 'Contrôle et Anti-débordement',
        image: ''
    }, {
        id: '1',
        titre: 'Signalisation industriel',
        image: ''
    }, {
        id: '1',
        titre: 'Tricônes De Forage',
        image: ''
    }, {
        id: '1',
        titre: 'Groupe electrogene',
        image: ''
    }, {
        id: '1',
        titre: 'Chenilles et Accessoires',
        image: ''
    }, {
        id: '1',
        titre: 'Composant Hydraulique',
        image: ''
    }, {
        id: '1',
        titre: 'Roulement',
        image: ''
    }, {
        id: '1',
        titre: 'Bras de chargement',
        image: ''
    }, {
        id: '1',
        titre: 'Produit Chimiques',
        image: ''
    },
];

const list_element = document.getElementById('list');
const pagination_element = document.getElementById('pagination');

let current_page = 1;
let rows = 5;

function DisplayList(items, wrapper, rows_per_page, page) {
    wrapper.innerHTML = "";
    page--;

    let start = rows_per_page * page;
    let end = start + rows_per_page;
    let paginatedItems = items.slice(start, end);

    for (let i = 0; i < paginatedItems.length; i++) {
        let item = paginatedItems[i];

        let item_element = document.createElement('div');
        item_element.classList.add('item');
        item_element.innerText = item;

        wrapper.appendChild(item_element);
    }
}

function SetupPagination(items, wrapper, rows_per_page) {
    wrapper.innerHTML = "";

    let page_count = Math.ceil(items.length / rows_per_page);
    for (let i = 1; i < page_count + 1; i++) {
        let btn = PaginationButton(i, items);
        wrapper.appendChild(btn);
    }
}

function PaginationButton(page, items) {
    let button = document.createElement('button');
    button.innerText = page;

    if (current_page == page) button.classList.add('active');

    button.addEventListener('click', function () {
        current_page = page;
        DisplayList(items, list_element, rows, current_page);

        let current_btn = document.querySelector('.pagenumbers button.active');
        current_btn.classList.remove('active');

        button.classList.add('active');
    });

    return button;
}

DisplayList(list_items, list_element, rows, current_page);
SetupPagination(list_items, pagination_element, rows);