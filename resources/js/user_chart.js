import Chart from "chart.js/auto";

const dynamicColors = () => {
    const r = Math.floor(Math.random() * 255);
    const g = Math.floor(Math.random() * 255);
    const b = Math.floor(Math.random() * 255);
    return "rgb(" + r + "," + g + "," + b + ")";
};

const graph = document.querySelector("#graph");
const graphPurok = document.querySelector("#graph-purok");

const colors = {
    "settled": {
        class: "text-emerald-600 bg-emerald-200",
        rgb: "rgb(5, 150, 105)",
    },
    "unresolved": {
        class: "text-neutral-500 bg-neutral-200",
        rgb: "rgb(115, 115, 115)"
    },
    "kp cases": {
        class: "text-orange-600 bg-orange-200",
        rgb: "rgb(251, 146, 60)"
    },
    "endorsed": {
        class: "text-blue-400 bg-blue-200",
        rgb: "rgb(96, 165, 250)"
    },
    "blotter cases": {
        class: "text-yellow-600 bg-yellow-200",
        rgb: "rgb(202, 138, 4)"
    },
    "dismissed": {
        class: "text-rose-600 bg-rose-200",
        rgb: "rgb(225, 29, 72)"
    },
};

const MONTHS = [
    "January",
    "February",
    "March",
    "April",
    "May",
    "June",
    "July",
    "August",
    "September",
    "October",
    "November",
    "December"
];

const DAYS = [
    "Sunday",
    "Monday",
    "Tuesday",
    "Wednesday",
    "Thursday",
    "Friday",
    "Saturday",
];

const COUNT = 7;

const dates = [];
const datesDataset = [];

const puroks = [];
const puroksDataset = [];

window.addEventListener('load', async () => {
    const PATH_REPORTS = graph.dataset.route;
    const PATH_REPORTS_PER_PUROK = graphPurok.dataset.route;

    async function fetchReports() {
        try {
            const data = await fetch(PATH_REPORTS, {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                credentials: 'same-origin',
            });

            if (!data.ok) {
                const errorOptions = { status: data.status, statusText: data.statusText };
                throw errorOptions;
            }

            const response = await data.json();

            const datesArray = response['message'];

            dates.push(...convertDatesToDays(datesArray["dates"]));

            for (const key in datesArray["dataset"]) {
                const obj = {
                    label: uppercaseFirstChar(key),
                    data: datesArray["dataset"][key],
                    borderColor: colors[key].rgb,
                    backgroundColor: colors[key].rgb
                }

                datesDataset.push(obj);
            }

        } catch (error) {
            console.error(error);
        }
    }

    async function fetchReportsPerPurok() {
        try {
            const data = await fetch(PATH_REPORTS_PER_PUROK, {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                credentials: 'same-origin',
            });

            if (!data.ok) {
                const errorOptions = { status: data.status, statusText: data.statusText };
                throw errorOptions;
            }

            const response = await data.json();

            const reportsArray = response['message'];
            puroks.push(...reportsArray['labels']);

            const temp = [];

            for (const key in reportsArray["datasets"]) {
                temp.push(reportsArray["datasets"][key]);
            }

            const obj = {
                label: "Cases per purok",
                data: temp,
                backgroundColor: [
                    'rgba(255, 99, 132)',
                    'rgba(255, 159, 64)',
                    'rgba(255, 205, 86)',
                    'rgba(75, 192, 192)',
                    'rgba(54, 162, 235)',
                    'rgba(153, 102, 255)',
                    'rgba(201, 203, 207)'
                ]
            };

            puroksDataset.push(obj);

        } catch (error) {
            console.error(error);
        }
    }

    await fetchReports();
    await fetchReportsPerPurok();

    //  Dates
    const data = {
        labels: dates,
        datasets: datesDataset
    };

    const config = {
        type: "line",
        data: data,
        options: {
            scale: {
                ticks: {
                    precision: 0
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                }
            }
        }
    };

    // Reports per purok
    const reportData = {
        labels: puroks,
        datasets: puroksDataset
    };

    const reportConfig = {
        type: "bar",
        data: reportData,
        options: {
            labels: {
                display: false,
            },
            scale: {
                ticks: {
                    precision: 0
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                }
            }
        }
    }


    const lineGraph = new Chart(graph, config);
    const barGraph = new Chart(graphPurok, reportConfig);

    window.addEventListener('resize', () => {
        lineGraph.resize();
        barGraph.resize();
    });
});

function getMonthsRange(count = COUNT) {
    let date = new Date();
    date.setMonth(date.getMonth() - (count - 1));

    const currDate = new Date(date.getFullYear(), date.getMonth(), 1);
    let year = date.getFullYear();
    let month = currDate.getMonth();

    const dates = [];

    while (dates.length <= count - 1) {
        if (month >= MONTHS.length) {
            year += 1;
            month = 0;
        }

        dates.push(new Date(year, month, 1));

        month++;
    }

    return dates;
}

function getDatesRange() {
    const dates = [];
    let currDate = new Date();

    while (dates.length < 7) {
        let year = currDate.getFullYear();
        let month = currDate.getMonth();

        dates.push(new Date(year, month, currDate.getDate()));
        currDate = new Date(year, month, currDate.getDate() - 1);
    }

    return dates;
}

function convertDateToMonths(array) {
    return array.map((date) => {
        return MONTHS[new Date(date).getMonth()];
    })
}

function convertDatesToDays(array) {
    return array.map((data) => {
        return new Date(data).toDateString();
    });
}

function reverseArray(array) {
    const arr = [];

    for (let i = array.length - 1; i >= 0; i--) {
        arr.push(array[i]);
    }

    return arr;
}

function uppercaseFirstChar(string) {
    const words = string.split(" ");
    const wordsArr = [];

    for (const word of words) {
        if (word == "kp") {
            wordsArr.push(word[0].toUpperCase() + word[1].toUpperCase());
            continue;
        }

        wordsArr.push(word[0].toUpperCase() + word.slice(1));
    }

    return wordsArr.join(" ");
}
