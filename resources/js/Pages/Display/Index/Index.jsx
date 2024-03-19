import React, { useState, useEffect } from "react";
import axios from "axios";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head } from "@inertiajs/react";
import HeaderTitle from "@/Components/Header/HeaderTitle";
import Tables from "@/Components/Tables";
import Grids from "@/Components/Grids";
import IndexLayout from "@/Components/Layout/IndexLayout";

const Index = ({ auth }) => {
    const [data, setData] = useState({
        items: [],
        entity: '',
        tables: null,
        grids: null,
        title: '',
    });
    const [filter, setFilter] = useState("");

    useEffect(() => {
        const entity = window.location.pathname.split('/')[1];

        axios.get(`/api/${entity}`)
            .then(response => {
                setData({
                    items: response.data.items,
                    entity: response.data.entity,
                    tables: response.data.config.tables,
                    grids: response.data.config.grids,
                    title: response.data.config.title,
                });
            })
            .catch(error => {
                console.error("There was an error fetching the data:", error);
            });
    }, []); // Empty dependency array means this effect runs once on mount

    const filteredItems = data.items.filter(
        (item) =>
            !filter ||
            Object.values(item).some((value) =>
                String(value).toLowerCase().includes(filter.toLowerCase())
            )
    );

    return (
        <AuthenticatedLayout user={auth.user}>
            <Head title={data.title} />
            <HeaderTitle
                title={data.title}
                breadcrumbs={[
                    { name: "Home", url: "/dashboard" },
                    { name: data.title },
                ]}
            />
            <div className="max-w-5xl mt-2 mx-auto sm:px-6 lg:px-8">
                <IndexLayout
                    entity={data.entity}
                    setFilter={setFilter}
                    createUrl={`/${data.entity}/create`}
                >
                    {data.tables && (
                        <Tables
                            items={filteredItems}
                            fields={data.tables.fields}
                            entity={data.entity}
                        />
                    )}
                    {data.grids && (
                        <Grids
                            items={filteredItems}
                            fields={data.grids.fields}
                            entity={data.entity}
                        />
                    )}
                </IndexLayout>
            </div>
        </AuthenticatedLayout>
    );
};

export default Index;
