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

document.addEventListener("DOMContentLoaded", function () {
  const searchForm = document.querySelector('form[role="search"]');
  const searchInput = searchForm.querySelector('input[name="pesquisa"]');

  searchForm.addEventListener("submit", function (event) {
    const cleanedTerm = searchInput.value.replace(/[^\w\s]/gi, "");
    searchInput.value = cleanedTerm;
  });
});
