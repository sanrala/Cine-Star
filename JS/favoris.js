//Menu Burger
function openNav() {
    document.getElementById("myNav").style.width = "100%";
}

function closeNav() {
    document.getElementById("myNav").style.width = "0%";
}
document.getElementById("myBtn").onmouseover = function () { myFunction() };


function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}
//Fin menu burger   


const films = [
    {
        id: 1,
        genre: "film",
        titre: "Qu'est ce qu'on a tous fait au bon dieu ?",
        lien: "cine1_resume.html",
        img: "image/Film1.jpg",
        categorie: "comedie",
        annee: "2022"
    },
    {
        id: 2,
        genre: "film",
        titre: "Les animaux fantastiques : Les secrets de Dumbledore",
        lien: "cine2_resume.html",
        img: "image/Film2.jpg",
        categorie: "fantastique",
        annee: "2022"
    },
    {
        id: 3,
        genre: "film",
        titre: "Sonic 2",
        lien: "cine3_resume.html",
        img: "image/Film3.jpg",
        categorie: "aventure",
        annee: "2022"
    },
    {
        id: 4,
        genre: "film",
        titre: "la cité perdue",
        lien: "cine4_resume.html",
        img: "image/Film4.jpg",
        categorie: "aventure",
        annee: "2022"
    },
    {
        id: 5,
        genre: "film",
        titre: "dr strange multiverse of madness",
        lien: "cine5_resume.html",
        img: "image/Film5.jpg",
        categorie: "action",
        annee: "2022"
    },
    {
        id: 6,
        genre: "film",
        titre: "le roi cerf",
        lien: "cine6_resume.html",
        img: "image/Film6.jpg",
        categorie: "animation",
        annee: "2022"
    },



]

const series = [
    {
        id: 1,
        genre: "serie",
        titre: "Anatomy of Scandal",
        lien: "cine1_resume.html",
        img: "image/serie1.jpg",
        categorie: "drame",
        année: "2022"
    },
    {
        id: 2,
        genre: "serie",
        titre: "Elite",
        lien: "cine2_resume.html",
        img: "image/serie2.jpg",
        categorie: "drame",
        année: "2022"
    },
    {
        id: 3,
        genre: "serie",
        titre: "Moon Knight",
        lien: "cine3_resume.html",
        img: "image/serie3.jpg",
        categorie: "fantastique",
        année: "2022"
    },
    {
        id: 4,
        genre: "serie",
        titre: "Russian Doll",
        lien: "cine4_resume.html",
        img: "image/serie4.jpg",
        categorie: "drame",
        année: "2022"
    },
    {
        id: 5,
        genre: "serie",
        titre: "Halo",
        lien: "cine5_resume.html",
        img: "image/serie5.jpg",
        categorie: "science fiction",
        année: "2022"
    },
    {
        id: 6,
        genre: "serie",
        titre: "Les 7 vies de Léa",
        lien: "cine6_resume.html",
        img: "image/serie6.jpg",
        categorie: "drame",
        année: "2022"
    }



]

const aps = [
    {
        id: 1,
        genre: "film",
        titre: "top gun : maverick",
        categorie: "action",
        année: "2022",
        img: "image/AP1.jpg"
    },
    {
        id: 2,
        genre: "film",
        titre: "tenor",
        lien: "cine2_resume.html",
        categorie: "comedie",
        année: "2022",
        img: "image/AP2.jpg"
    },
    {
        id: 3,
        genre: "film",
        titre: "The Northman",
        lien: "cine3_resume.html",
        categorie: "historique",
        année: "2022",
        img: "image/AP3.jpg"
    },
    {
        id: 4,
        genre: "film",
        titre: "Limbo",
        lien: "cine4_resume.html",
        categorie: "drame",
        année: "2022",
        img: "image/AP4.jpg"
    },
    {
        id: 5,
        genre: "film",
        titre: "jurassic world : Le monde d'après",
        lien: "cine5_resume.html",
        categorie: "Aventure",
        année: "2022",
        img: "image/AP5.jpg"
    },
    {
        id: 6,
        genre: "film",
        titre: "Firestarter",
        lien: "cine6_resume.html",
        categorie: "Epouvante-horreur",
        année: "2022",
        img: "image/AP6.jpg",
    }



]


// -----------------------------FAVORIS-------------------------------


const myFavorites = document.querySelector('.myFavorites')

// const resumer = document.createElement('div')
// resumer.style.border = ('1px solid black')
// resumer.style.margin = "150px"
// resumer.style.display = "flex"
// resumer.style.flexWrap = "wrap"
// resumer.style.justifyContent = "column"


// const h2 = document.createElement('h2')
// h2.innerText= "TITRE"

// const img = document.createElement('img')
// img.src = "image/Film6.jpg"
// img.alt = films.titre
// img.style.width = '200px'
// img.style.height = '300px'

// const p = document.createElement('p')
// p.innerText = "Ce sont bientôt les 40 ans de mariage de Claude et Marie Verneuil. Pour cette occasion, leurs quatre filles décident d’organiser une grande fête surprise dans la maison familiale de Chinon et d’y inviter les parents de chacun des gendres, pour quelques jours. Claude et Marie vont devoir accueillir sous leur toit les parents de Rachid, David, Chao et Charles : ce séjour 'familial' s'annonce mouvementé."













myFavorites.append(resumer)
resumer.append( img,h2,p)


// heartbox.addEventListener ('click',(event)=>{
//     const heartbox = document.querySelector('.heartbox')
//     event.preventDefault()
// })