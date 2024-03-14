import React from "react";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head } from "@inertiajs/react";
import HeaderTitle from "@/Components/Header/HeaderTitle";
import { Pie, Bar } from "react-chartjs-2";
import {
    Chart as ChartJS,
    CategoryScale,
    LinearScale,
    BarElement,
    Title,
    Tooltip,
    Legend,
    ArcElement,
} from "chart.js";

ChartJS.register(
    CategoryScale,
    LinearScale,
    BarElement,
    Title,
    Tooltip,
    Legend,
    ArcElement
);

const Dashboard1 = ({ auth }) => {
    const pieData1 = {
        labels: ["Red", "Blue", "Yellow"],
        datasets: [
            {
                label: "Dataset 1",
                data: [300, 50, 100],
                backgroundColor: [
                    "rgb(255, 99, 132)",
                    "rgb(54, 162, 235)",
                    "rgb(255, 205, 86)",
                ],
            },
        ],
        options: {
            plugins: {
                legend: { position: "bottom" },
                title: { display: true, text: "Pie Chart 1 Title" },
            },
            maintainAspectRatio: false,
        },
    };

    const barData2 = {
        labels: ["January", "February", "March", "April", "May", "June"],
        datasets: [
            {
                label: "Dataset 2",
                data: [65, 59, 80, 81, 56, 55],
                backgroundColor: "rgba(255, 99, 132, 0.5)",
            },
        ],
        options: {
            plugins: {
                legend: { position: "bottom" },
                title: { display: true, text: "Pie Chart 1 Title" },
            },
            maintainAspectRatio: false,
        },
    };

    const pieData3 = {
        labels: ["Green", "Purple", "Orange"],
        datasets: [
            {
                label: "Dataset 3",
                data: [70, 45, 85],
                backgroundColor: [
                    "rgb(75, 192, 192)",
                    "rgb(153, 102, 255)",
                    "rgb(255, 159, 64)",
                ],
            },
        ],
        options: {
            plugins: {
                legend: { position: "bottom" },
                title: { display: true, text: "Pie Chart 1 Title" },
            },
            maintainAspectRatio: false,
        },
    };

    const barData4 = {
        title: "Dataset 4",
        labels: [
            "July",
            "August",
            "September",
            "October",
            "November",
            "December",
        ],
        datasets: [
            {
                label: "Dataset 4",
                data: [85, 69, 20, 51, 76, 65],
                backgroundColor: "rgba(54, 162, 235, 0.5)",
            },
        ],
        options: {
            plugins: {
                legend: { position: "bottom" },
                title: { display: true, text: "Pie Chart 1 Title" },
            },
            maintainAspectRatio: false,
        },
    };

    // Function to sum data points in a dataset
    const sumData = (dataset) => dataset.reduce((a, b) => a + b, 0);

    return (
        <AuthenticatedLayout user={auth.user}>
            <Head title="Dashboard 1" />
            <HeaderTitle
                classSize="max-w-12xl mx-auto sm:px-6 lg:px-8"
                classTitle="text-1xl text-center font-bold leading-7 text-gray-900 sm:truncate sm:text-1xl sm:tracking-tight"
                title="PAYMENT FOR ECOSYSTEM SERVICES TO SUPPORT COMMUNITY BASED FOREST CONSERVATION"
            ></HeaderTitle>
            <div className="mt-2 mx-auto sm:px-6 lg:px-8">
                <div className="grid grid-cols-1 lg:grid-cols-2 gap-4">
                    {/* Card 1 */}
                    <div className="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-5">
                        <h2 className="text-lg font-bold mb-2">Card 1 Title</h2>
                        <div className="grid sm:grid-cols-1 lg:grid-cols-2 gap-4">
                            <div className="mb-8 lg:mb-0">
                                <div
                                    className="chart-container"
                                    style={{ height: "300px", width: "100%" }}
                                >
                                    <Pie
                                        data={pieData1}
                                        options={pieData1.options}
                                    />
                                    <div className="text-center mt-2">
                                        Subtitle: Total -{" "}
                                        {sumData(pieData1.datasets[0].data)}
                                    </div>
                                </div>
                            </div>
                            <div className="mb-8 lg:mb-0">
                                <div
                                    className="chart-container"
                                    style={{ height: "300px", width: "100%" }}
                                >
                                    <Bar
                                        data={barData2}
                                        options={barData2.options}
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                    {/* Card 2 */}
                    <div className="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-5">
                        <h2 className="text-lg font-bold mb-2">Card 2 Title</h2>
                        <div className="grid sm:grid-cols-1 lg:grid-cols-2 gap-4">
                            <div className="mb-9 lg:mb-0">
                                <div
                                    className="chart-container"
                                    style={{ height: "300px", width: "100%" }}
                                >
                                    <Pie
                                        data={pieData3}
                                        options={pieData3.options}
                                    />
                                </div>
                                <div className="text-center mt-2">
                                    Subtitle: Total -{" "}
                                    {sumData(pieData3.datasets[0].data)}
                                </div>
                            </div>
                            <div className="mb-8 lg:mb-0">
                                <div
                                    className="chart-container"
                                    style={{ height: "300px", width: "100%" }}
                                >
                                    <Bar
                                        data={barData4}
                                        options={barData4.options}
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div className="mt-2 mx-auto sm:px-6 lg:px-8">
                <div className="grid grid-cols-1 lg:grid-cols-1 gap-4">
                    <div className="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-5">
                        <h2 className="text-lg font-bold mb-2">Card 3 Title</h2>
                        <div className="grid sm:grid-cols-1 lg:grid-cols-4 gap-4">
                            <div className="mb-8 lg:mb-0">
                                <div
                                    className="chart-container"
                                    style={{
                                        height: "300px",
                                        width: "100%",
                                    }}
                                >
                                    <Pie
                                        data={pieData1}
                                        options={pieData1.options}
                                    />
                                    <div className="text-center mt-2 mb-3">
                                        Subtitle: Total -{" "}
                                        {sumData(pieData1.datasets[0].data)}
                                    </div>
                                </div>
                            </div>
                            <div className="mb-8 lg:mb-0">
                                <div
                                    className="chart-container"
                                    style={{
                                        height: "300px",
                                        width: "100%",
                                    }}
                                >
                                    <Bar
                                        data={barData2}
                                        options={barData2.options}
                                    />
                                </div>
                            </div>
                            <div className="mb-8 lg:mb-0">
                                <div
                                    className="chart-container"
                                    style={{
                                        height: "300px",
                                        width: "100%",
                                    }}
                                >
                                    <Bar
                                        data={barData2}
                                        options={barData2.options}
                                    />
                                </div>
                            </div>
                            <div className="mb-8 lg:mb-0">
                                <div
                                    className="chart-container"
                                    style={{
                                        height: "300px",
                                        width: "100%",
                                    }}
                                >
                                    <Bar
                                        data={barData2}
                                        options={barData2.options}
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </AuthenticatedLayout>
    );
};

export default Dashboard1;
