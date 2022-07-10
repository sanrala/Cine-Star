document.getElementById("myBtn").onmouseover = function () { myFunction() };


function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}


const story = [
    {
        id: 1,
        genre: "film",
        titre: "Qu'est ce qu'on a tous fait au bon dieu ?",
        synopsis: `Ce sont bientôt les 40 ans de mariage de Claude et Marie Verneuil. Pour cette occasion, leurs quatre filles décident d’organiser une grande fête surprise dans la maison familiale de Chinon et d’y inviter les parents de chacun des gendres, pour quelques jours. Claude et Marie vont devoir accueillir sous leur toit les parents de Rachid, David, Chao et Charles : ce séjour "familial" s'annonce mouvementé.`,
        img: "image/Film1.jpg",
        sortie : `6 avril 2022 en salle / 1h 38min / Comédie`,
        product : ``,
        realisateur : ``,
        acteur_actrice : ``,
        photos : "",
        BA : `"https://www.youtube.com/embed/gvIJzXMT5W0"`
        
    },
    {
        id: 2,
        genre: "film",
        titre: "Les animaux fantastiques : Les secrets de Dumbledore",
        lien: "cine2_resume.html",
        img: "image/Film2.jpg",
        categorie: "fantastique",
        annee: "2022",
    },
    {
        id: 3,
        genre: "film",
        titre: "Sonic 2",
        lien: "cine3_resume.html",
        img: "image/Film3.jpg",
        categorie: "aventure",
        annee: "2022",
    },
    {
        id: 4,
        genre: "film",
        titre: "la cité perdue",
        lien: "cine4_resume.html",
        img: "image/Film4.jpg",
        categorie: "aventure",
        annee: "2022",
    },
    {
        id: 5,
        genre: "film",
        titre: "dr strange multiverse of madness",
        lien: "cine5_resume.html",
        img: "image/Film5.jpg",
        categorie: "action",
        annee: "2022",
    },
    {
        id: 6,
        genre: "film",
        titre: "le roi cerf",
        lien: "cine6_resume.html",
        img: "image/Film6.jpg",
        categorie: "animation",
        annee: "2022",
    },
    {
        id: 7,
        genre: "film",
        titre: "Incroyable mais vrai",
        lien: "cine6_resume.html",
        img: "image/incroyableMaisVrai.jpg",
        categorie: "comedie",
        annee: "2022",
    },
    {
        id: 8,
        genre: "film",
        titre: "buzz",
        lien: "cine6_resume.html",
        img: "image/buzz.jpg",
        categorie: "animation",
        annee: "2022",
    },
    {
        id: 9,
        genre: "ap",
        titre: "jurassic world : Le monde d'après",
        lien: "cine5_resume.html",
        categorie: "Aventure",
        annee: "2022",
        img: "image/AP5.jpg",
    },
    {
        id: 10,
        genre: "film",
        titre: "l'homme parfait'",
        lien: "cine6_resume.html",
        img: "image/hommeParfait.jpg",
        categorie: "comédie",
        annee: "2022",
    },
    {
        id: 11,
        genre: "ap",
        titre: "top gun : maverick",
        categorie: "action",
        annee: "2022",
        img: "image/AP1.jpg",
    },

    {
        id: 12,
        genre: "ap",
        titre: "The Northman",
        lien: "cine3_resume.html",
        categorie: "historique",
        annee: "2022",
        img: "image/AP3.jpg",
    },

]



const film = document.querySelector('.films')
const sypnosis = document.querySelector('#resume')


    // const iframe = document.createElement('iframe')
    // iframe.id.add('text')
    // iframe.style.width="560px"
    // iframe.style.height="315px"
    // iframe.src = story.BA
   

    // const imgFilm = document.createElement('img')
    // imgFilm.src = story.img
    // imgFilm.style.width = "1301px"
    // imgFilm.style.height = "366px"
    // imgFilm.alt = story.titre
    
//     const displayStory = ()=> {
      
//         const storyNode = story.map(story => {
   
//             return createStory(story)
//         });
   
//         sypnosis.append(...storyNode)
//     }
    

//     const createStory = (story) => {
//  const p = document.createElement('p')
//  p.classList.add('sypnosis')
//  p.innerText=story.sypnosis

//     // film.append(iframe, imgFilm)
//     sypnosis.append(p)

// console.log(story.sypnosis);

//     }

//     displayStory()