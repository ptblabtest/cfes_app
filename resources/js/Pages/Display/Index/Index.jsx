import React, { useState } from "react";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head } from "@inertiajs/react";
import HeaderTitle from "@/Components/Header/HeaderTitle";
import Tables from "@/Components/Content/Tables";
import Grids from "@/Components/Content/Grids";
import IndexLayout from "@/Components/Layout/IndexLayout";

const Index = ({ items, auth, title, entity, tables = null, grids = null, createUrl, exportUrl }) => {
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
            <IndexLayout
                entity={entity}
                setFilter={setFilter}
                createUrl={createUrl}
                exportUrl={exportUrl}
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
        </AuthenticatedLayout>
    );
};

export default Index;
