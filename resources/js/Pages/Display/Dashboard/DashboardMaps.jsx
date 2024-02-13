import React, { useState } from "react";
import { Head } from "@inertiajs/react";
import Maps from "@/Components/Content/Maps";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { MagnifyingGlassIcon } from '@heroicons/react/24/outline';
import HeaderTitle from "@/Components/Header/HeaderTitle";

const DashboardMaps = ({ auth }) => {


    const [filter, setFilter] = useState("");

    // Function to handle changes in the filter input
    const handleFilterChange = (e) => {
        setFilter(e.target.value);
    };

    // Dummy data for demonstration
    const dummyItems = [
        { id: 1, name: "Location A", latitude: -0.789275, longitude: 113.921327 },
        { id: 2, name: "Location B", latitude: -1.789275, longitude: 114.921327 },
        // Add more dummy items as needed
    ];

    const fields = {
        name: { label: "Name", type: "text" },
        date: { label: "Date", type: "date" },
        latitude: { label: "Latitude", type: "number" },
        longitude: { label: "Longitude", type: "number" },
        // ... other fields as needed ...
    };

    // Filtered items based on the filter state
    const filteredItems = dummyItems.filter(item => 
        item.name.toLowerCase().includes(filter.toLowerCase())
    );

    return (
        <AuthenticatedLayout user={auth.user}>
            <Head title="Dashboard Maps" />

            <div className="sticky top-0 z-40 mb-2">
                <HeaderTitle title={'Dashboard Peta'} />
            </div>
            <div className="h-screen w-full relative">
                {/* Filter Card */}
                <div className="absolute top-4 left-4 z-10 p-2 bg-white shadow rounded-lg">
                    <div className="flex items-center space-x-2 bg-gray-100 p-2 rounded-lg">
                        <MagnifyingGlassIcon className="h-4 w-4 text-gray-500" />
                        <input
                            type="text"
                            placeholder="Search..."
                            value={filter}
                            onChange={handleFilterChange}
                            className="bg-transparent border-none flex-1 text-sm focus:ring-0"
                        />
                    </div>
                    {/* Additional filter options can be added here */}
                </div>

                {/* Maps Section */}
                <Maps items={dummyItems.filter(item => item.name.toLowerCase().includes(filter.toLowerCase()))} fields={fields} />
            </div>
        </AuthenticatedLayout>
    );
};

export default DashboardMaps;
