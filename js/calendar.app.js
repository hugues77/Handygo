// Traitement MC Datepicker

//date depart - post trip
const picker = MCDatepicker.create({
    el: '#date-depart',
    minDate: new Date(),
	customWeekDays: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Dimanche'],
	customMonths: ['Janvier', 'Fevrier', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Decembre'],
	customCancelBTN: 'Annuler',
	customClearBTN: 'Effacer',
	customOkBTN: 'Valider',
	dateFormat: 'dd mmmm yyyy',
    theme: {
        theme_color: '#dc143c',
		main_background: '#222',
		active_text_color: '#fff',
		inactive_text_color: '#a9a9a9',
		picker_header: {
            active: '#fff',
            inactive: 'rgba(0, 0, 0, 0.2)'
        },
		button: {
            success: {
                foreground: '#1B9CFC'
            },
            danger: {
                foreground: '#dc143c'
            }
        },
		date: {
            active: {
                picked: {
                    foreground: '#dc143c',
                    background: '#fff'
                },
                today: {
                    foreground: '#fff',
                    background: '#dc143c'
                }
            }
        }

    }
});

//date d'arrivée - post -trip
const picker1 = MCDatepicker.create({ 
    el: '#date-arrivee',
    minDate: new Date(),
	customWeekDays: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Dimanche'],
	customMonths: ['Janvier', 'Fevrier', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Decembre'],
	customCancelBTN: 'Annuler',
	customClearBTN: 'Effacer',
	customOkBTN: 'Valider',
	dateFormat: 'dd-mmmm-yyyy',
    theme: {
        theme_color: '#dc143c',
		main_background: '#222',
		active_text_color: '#fff',
		inactive_text_color: '#a9a9a9',
		picker_header: {
            active: '#fff',
            inactive: 'rgba(0, 0, 0, 0.2)'
        },
		button: {
            success: {
                foreground: '#1B9CFC'
            },
            danger: {
                foreground: '#dc143c'
            }
        },
		date: {
            active: {
                picked: {
                    foreground: '#dc143c',
                    background: '#fff'
                },
                today: {
                    foreground: '#fff',
                    background: '#dc143c'
                }
            }
        }

    }
}); 

//date de recherche trajet
const picker2 = MCDatepicker.create({
    el: '#date_search',
    minDate: new Date(),
	customWeekDays: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Dimanche'],
	customMonths: ['Janvier', 'Fevrier', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Decembre'],
	customCancelBTN: 'Annuler',
	customClearBTN: 'Effacer',
	customOkBTN: 'Valider',
	dateFormat: 'dd mmmm yyyy',
    theme: {
        theme_color: '#dc143c',
		main_background: '#222',
		active_text_color: '#fff',
		inactive_text_color: '#a9a9a9',
		picker_header: {
            active: '#fff',
            inactive: 'rgba(0, 0, 0, 0.2)'
        },
		button: {
            success: {
                foreground: '#1B9CFC'
            },
            danger: {
                foreground: '#dc143c'
            }
        },
		date: {
            active: {
                picked: {
                    foreground: '#dc143c',
                    background: '#fff'
                },
                today: {
                    foreground: '#fff',
                    background: '#dc143c'
                }
            }
        }

    }
});

// date de naissance user
const picker3 = MCDatepicker.create({
    el: '#naissance',
	customWeekDays: ['Dimanche', 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Dimanche'],
	customMonths: ['Janvier', 'Fevrier', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Decembre'],
	customCancelBTN: 'Annuler',
	customClearBTN: 'Effacer',
	customOkBTN: 'Valider',
	dateFormat: 'dd mmmm yyyy',
    theme: {
        theme_color: '#dc143c',
		main_background: '#222',
		active_text_color: '#fff',
		inactive_text_color: '#a9a9a9',
		picker_header: {
            active: '#fff',
            inactive: 'rgba(0, 0, 0, 0.2)'
        },
		button: {
            success: {
                foreground: '#1B9CFC'
            },
            danger: {
                foreground: '#dc143c'
            }
        },
		date: {
            active: {
                picked: {
                    foreground: '#dc143c',
                    background: '#fff'
                },
                today: {
                    foreground: '#fff',
                    background: '#dc143c'
                }
            }
        }

    }
}); 
