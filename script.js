document.addEventListener("DOMContentLoaded", function () {
  // Remove empty <p></p> tags
  document.querySelectorAll("p").forEach(function (p) {
    if (p.innerHTML.trim() === "") {
      p.remove();
    }
  });

  // Remove all <br> tags
  document.querySelectorAll("br").forEach(function (br) {
    br.remove();
  });

  // Remove specific <p> tags after the image containing links from "agenciabrasil.ebc.com.br"
  document.querySelectorAll("img + p").forEach(function (p) {
    if (p.innerHTML.includes("agenciabrasil.ebc.com.br")) {
      p.remove();
    }
  });
});
