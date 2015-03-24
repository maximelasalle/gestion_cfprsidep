var menuOut = 0;

function remiseMenuOut() {
    if (menuOut == 0) {
        $(".remiseProfBody_menuRemiseProf").addClass("remiseProfBody_menuOut");
        menuOut = 1;
    } else {
        $(".remiseProfBody_menuRemiseProf").removeClass("remiseProfBody_menuOut");
        menuOut = 0;
    }
}