const container = document.querySelector(".container");
const pertanyaan = document.querySelector(".pertanyaan");
const jawaban = document.querySelector(".input");
const btn = document.querySelector(".button");
const loaders = document.getElementById("loader");

let init = 0;
let userData = [];

const botSay = (data) => {
  return [
    `Hallo saya AlBot, siapa nama anda?`,
    `owh...${data.nama}, umur kamu berapa?`,
    `hahaha ${data.umur} sama dong, trusss hobby kamu apa?`,
    `serius?, aku juga suka ${data.hobby}. btw kamu kerja apa sekarang?`,
    `wah keren bisa kerja ${data.pekerjaan}. kalau begitu kita udahan dulu yaa percakapannya`,
    `Terimah Kasih, saya senang berkenalan dengan anda!`,
  ];
};

pertanyaan.innerHTML = botSay("")[0];

// Fungsi Fungsi
function botStart() {
  if (jawaban.value.length < 1) return alert("Anda belum mengisi inputan");
  init++;
  if (init === 1) {
    pertanyaanSelanjutnya({ nama: jawaban.value });
  } else if (init === 2) {
    pertanyaanSelanjutnya({ umur: jawaban.value });
  } else if (init === 3) {
    pertanyaanSelanjutnya({ hobby: jawaban.value });
  } else if (init === 4) {
    pertanyaanSelanjutnya({ pekerjaan: jawaban.value });
  } else if (init === 5) {
    pertanyaan.innerHTML = "Terima Kasih, senang bisa membantu anda!";
  } else {
    botEnd();
  }
}

function pertanyaanSelanjutnya(jawabanUser) {
  console.log(userData);
  loaders.style.display = "block";
  container.style.filter = "blur(3px)";
  setTimeout(() => {
    pertanyaan.innerHTML = botSay(jawabanUser)[init];
    container.style.filter = "none";
    loaders.style.display = "none";
  }, [1200]);
  userData.push(jawaban.value);
  jawaban.value = "";
}

function botEnd() {
  pertanyaan.innerHTML = "Bot the End....";
  jawaban.innerHTML = "";
  setTimeout(() => {
    pertanyaan.innerHTML = botSay("")[0];
  }, 1500);
}
