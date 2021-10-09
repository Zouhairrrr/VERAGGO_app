// const lang = document.querySelector('.Lang');
// const frlink = document.querySelector('.frlink');
// const enlang = document.querySelector('.enLang');
// const enlink = document.querySelector('.enlink');


// Async
fetch('./data/en.json').then(response => {
  return response.json();
}).then(data => {
  en(data);
}).catch(err => {
  console.log(err);
});


fetch('./data/fr.json').then(response => {
    return response.json();
  }).then(data => {
    fr(data);
  }).catch(err => {
    console.log(err);
  });

function en(data) {
  console.log('en :', data);
}


function fr(data) {
  console.log('fr :', data);
}





// if(window.location.hash){
//     if(window.location)
// }

// var data = JSON.parse()
// console.log (mydata[0]);

// fetch(data)
//   .then(function (response) {
//     // The JSON data will arrive here
//     console.log(response)
//   })
//   .catch(function (err) {
//     // If an error occured, you will catch it here
//     console.log('error')
//   });

// frlink.addEventListener('click', hadnlLang);

// function hadnlLang(e) {



//     frlink.classList.toggle('act')


// }









// var data = {
//     "About": [
//         {
//             "navBar": [
//                 {
//                     "item1": "Home",
//                     "item2": "About Us",
//                     "item3": "Products",
//                     "item4": "services",
//                     "item5": "SAV & MAINTENANCE"
//                 }
//             ]
//         },
//         {
//             "captions": [
//                 {
//                     "title": "ABOUT US",
//                     "desc": "Verrago is a company specialized in industrial supply operating in the Africanmarket for several years.With a wealth of experience in the Oil, Gas, Mining and other sectors, and as apartneroffers them turnkey solutions in terms of improving the performance of theirmachines, equipment, installations and processes.Several product families, a wide range of industrial tools, thousands of items,sound advice from our expert engineers, a local approach, technical support,24/7 after-sales and maintenance services, and many other advantages areavailable to you to respond quickly and efficiently to your needs."
//                 }
//             ]
//         },
//         {
//             "copyright": [
//                 {
//                     "item": "all rights reserved © 2021"
//                 }
//             ]
//         }
//     ],
// }