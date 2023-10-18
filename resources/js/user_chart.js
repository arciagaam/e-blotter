import Chart from "chart.js/auto";

const graph = document.querySelector("#graph");

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

window.addEventListener('load', async () => {
    const PATH = graph.dataset.route;

    async function fetchReports() {
        try {
            const data = await fetch(PATH, {
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
                    data: datesArray["dataset"][key]
                }

                datesDataset.push(obj);
            }

        } catch (error) {
            console.error(error);
        }
    }

    await fetchReports();

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

    new Chart(graph, config)
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
        return DAYS[new Date(data).getDay()];
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
        wordsArr.push(word[0].toUpperCase() + word.slice(1));
    }

    return wordsArr.join(" ");
}