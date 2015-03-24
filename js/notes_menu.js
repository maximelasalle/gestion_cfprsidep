var menuOut = 0;

function notesMenuOut() {
    if (menuOut == 0) {
        $(".notesProfBody_menuNotesProf").addClass("notesProfBody_menuOut");
        menuOut = 1;
    } else {
        $(".notesProfBody_menuNotesProf").removeClass("notesProfBody_menuOut");
        menuOut = 0;
    }
}