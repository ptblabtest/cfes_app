import React, { useState } from "react";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head } from "@inertiajs/react";
import HeaderTitle from "@/Components/Header/HeaderTitle";
import Tables from "@/Components/Tables";
import Grids from "@/Components/Grids";
import IndexLayout from "@/Components/Layout/IndexLayout";

const Index = ({
    items,
    auth,
    title,
    entity,
    tables = null,
    grids = null,
}) => {
    const [filter, setFilter] = useState("");
    const filteredItems = items.filter(
        (item) =>
            !filter ||
            Object.values(item).some((value) =>
                String(value).toLowerCase().includes(filter.toLowerCase())
            )
    );

    return (
        <AuthenticatedLayout user={auth.user}>
            <Head title={title} />
            <HeaderTitle
                title={title}
                breadcrumbs={[
                    { name: "Home", url: "/dashboard" },
                    { name: title },
                ]}
            />
                    <div className="max-w-5xl mt-2 mx-auto sm:px-6 lg:px-8">
            <IndexLayout
                entity={entity}
                setFilter={setFilter}
                createUrl={`/${entity}/create`}
            >
                {tables && (
                    <Tables
                        items={filteredItems}
                        fields={tables.fields}
                        entity={entity}
                    />
                )}
                {grids && (
                    <Grids
                        items={filteredItems}
                        fields={grids.fields}
                        entity={entity}
                    />
                )}
            </IndexLayout>
            </div>
            
        </AuthenticatedLayout>
    );
};

export default Index;
