console.log("Welcome to Spotify!");

//initialize
let songIndex=0;
let audioElement = new Audio('songs/1.mp3');
let masterPlay= document.getElementById("masterPlay");
let myProgressBar= document.getElementById("myProgressBar");
let gif= document.getElementById("gif");
let masterSongName= document.getElementById("masterSongName");
let songItems= Array.from(document.getElementsByClassName('songItem'));

let songs=[
    {songName:"Sweater Weather", filePath: "songs/1.mp3", coverPath: "covers/1.jpg"},
    {songName:"Softcore", filePath: "songs/2.mp3", coverPath: "covers/2.jpg"},
    {songName:"Let me Love You", filePath: "songs/3.mp3", coverPath: "covers/3.jpg"},
    {songName:"Counting Stars", filePath: "songs/4.mp3", coverPath: "covers/4.jpg"},
    {songName:"Unforgettable", filePath: "songs/5.mp3", coverPath: "covers/5.jpg"},
    {songName:"Blinding Lights", filePath: "songs/6.mp3", coverPath: "covers/6.jpg"},
    {songName:"See You Again", filePath: "songs/7.mp3", coverPath: "covers/7.jpg"},
    {songName:"Everybody(Backstreet's back)", filePath: "songs/8.mp3", coverPath: "covers/8.jpg"},
    {songName:"Love the Way You Lie", filePath: "songs/9.mp3", coverPath: "covers/9.jpg"},
    {songName:"Heat Waves", filePath: "songs/10.mp3", coverPath: "covers/10.jpg"},
]

songItems.forEach((element,i)=>{
    element.getElementsByTagName("img")[0].src=songs[i].coverPath;
    element.getElementsByClassName("songName")[0].innerText = songs[i].songName;
})

// audioElement.play();

//handle play/pause button
masterPlay.addEventListener('click',()=>{
    if(audioElement.paused || audioElement.currentTime<=0){
        audioElement.play();
        masterPlay.classList.remove('fa-play-circle');
        masterPlay.classList.add('fa-pause-circle');
        gif.style.opacity=1;
    }
    else{
        audioElement.pause();
        masterPlay.classList.remove('fa-pause-circle');
        masterPlay.classList.add('fa-play-circle');
        gif.style.opacity=0;
    }
})

//eventlisteners
audioElement.addEventListener('timeupdate',()=>{
    //update seekbar
    progress= parseInt((audioElement.currentTime/audioElement.duration)*100);
    myProgressBar.value= progress;
})

myProgressBar.addEventListener('change',()=>{
    audioElement.currentTime= myProgressBar.value * audioElement.duration/100;
})

const makeAllPlays = ()=>{
    Array.from(document.getElementsByClassName('songItemPlay')).forEach((element)=>{
        element.classList.remove('fa-pause-circle'); 
        element.classList.add('fa-play-circle'); 
    })
}

Array.from(document.getElementsByClassName('songItemPlay')).forEach((element)=>{
    element.addEventListener('click', (e)=>{
        makeAllPlays();
        songIndex= parseInt(e.target.id);
        e.target.classList.remove('fa-play-circle');
        e.target.classList.add('fa-pause-circle'); 
        audioElement.src= `songs/${songIndex+1}.mp3`;
        masterSongName.innerText=songs[songIndex].songName;
        audioElement.currentTime=0;
        audioElement.play();
        gif.style.opacity=1;
        masterPlay.classList.remove('fa-play-circle');
        masterPlay.classList.add('fa-pause-circle');
    })
})

document.getElementById('next').addEventListener('click',()=>{
    playNextSong();   
})

document.getElementById('previous').addEventListener('click',()=>{
    if(songIndex<=0){
        songIndex=0;
    }
    else{
        songIndex -= 1;
    }
    audioElement.src= `songs/${songIndex+1}.mp3`;
    masterSongName.innerText=songs[songIndex].songName;
    audioElement.currentTime=0;
    audioElement.play();
    gif.style.opacity=1;
    masterPlay.classList.remove('fa-play-circle');
    masterPlay.classList.add('fa-pause-circle');    
})

// Eventlistener for automatically playing next song when the previous song ends

audioElement.addEventListener('ended', ()=>{
    playNextSong();
});

const playNextSong = () =>{
    songIndex = (songIndex+1)%songs.length; // return to first element if at end
    audioElement.src= songs[songIndex].filePath;
    masterSongName.innerText= songs[songIndex].songName;
    audioElement.currentTime=0;
    audioElement.play();
    gif.style.opacity=1;
    masterPlay.classList.remove('fa-play-circle');
    masterPlay.classList.add('fa-pause-circle');   
}

