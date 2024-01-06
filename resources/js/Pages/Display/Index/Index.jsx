import React from "react";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head } from "@inertiajs/react";
import HeaderTitle from "@/Components/Header/HeaderTitle";
import MapComponent from "@/Components/Content/MapComponent";
import EntityGrid from "@/Components/Content/EntityGrid";
import EntityTable from "@/Components/Content/EntityTable";

const Index = ({ items, fields, auth, title, entity }) => {

    const hasCoordinates = fields.x_coordinate && fields.y_coordinate;

    return (
        <AuthenticatedLayout user={auth.user}>
            <Head title={title} />
            <div className="sticky top-0 z-10 ">
            <HeaderTitle title={title} entity={entity} />
            </div>
            {hasCoordinates && (
                <MapComponent items={items} fields={fields}/>
            )}
            <EntityTable items={items} fields={fields} entity={entity} />
        </AuthenticatedLayout>
    );
};

export default Index;