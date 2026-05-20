// 3 game objecten in JavaScript

const energieKristal = {
    naam: "Energie Kristal",
    type: "Consumable",
    effect: "Herstelt stamina of mana",
    zeldzaamheid: "Zeldzaam",
    waarde: 150
};

const mechanischSchild = {
    naam: "Mechanisch Schild",
    type: "Defense",
    effect: "Blokkeert 50% schade gedurende 5 seconden",
    zeldzaamheid: "Episch",
    waarde: 500
};

const schaduwZwaard = {
    naam: "Schaduw Zwaard",
    type: "Weapon",
    effect: "Extra schade in het donker",
    zeldzaamheid: "Legendarisch",
    waarde: 1000
};

// Alle objecten in een array
const gameObjecten = [
    energieKristal,
    mechanischSchild,
    schaduwZwaard
];

console.log(gameObjecten);
