const pertanyaan = document.querySelector(".pertanyaan");
const jawaban = document.querySelector(".input");
const btn = document.querySelector(".button");

let init = 0;

const botSay = (data) => {
  return [
    `Hallo saya AlBot, siapa nama anda?`,
    `owh...${data.nama}, umur kamu berapa?`,
    `hahaha ${data.umur} sama dong, trusss hobby kamu apa?`,
    `serius?, aku juga suka ${data.hobby}. btw kamu kerja apa sekarang?`,
    `wah keren bisa kerja ${data.pekerjaan}. kalau begitu kita udahan dulu yaa percakapannya`,
    `Terimah Kasih, saya senang berkenalan dengan anda!`
  ];
};

pertanyaan.innerHTML = botSay("")[0];

// Fungsi Fungsi
function botStart() {
  init++;
  if (init === 1) {
    setTimeout(() => pertanyaanSelanjutnya({ nama: jawaban.value }), 1200);
    setTimeout(() => (jawaban.value = ""), 1300);
  } else if (init === 2) {
    setTimeout(() => pertanyaanSelanjutnya({ umur: jawaban.value }), 1200);
    setTimeout(() => (jawaban.value = ""), 1300);
  } else if (init === 3) {
    setTimeout(() => pertanyaanSelanjutnya({ hobby: jawaban.value }), 1200);
    setTimeout(() => (jawaban.value = ""), 1300);
  } else if (init === 4) {
    setTimeout(() => pertanyaanSelanjutnya({ pekerjaan: jawaban.value }), 1200);
    setTimeout(() => (jawaban.value = ""), 1300);
  } else if (init === 5) {
    botFinisihing();
  } else {
    botEnd();
  }
}

function pertanyaanSelanjutnya(jawabanUser) {
  pertanyaan.innerHTML = botSay(jawabanUser)[init];
}

function botFinisihing() {
  pertanyaan.innerHTML = "Bot the End...";
  pertanyaan.innerHTML = botSay("")[0];
  jawaban.innerHTML = "";
}

function botEnd() {
  pertanyaan.innerHTML = "Bot the End....";
  jawaban.innerHTML = "";
}
