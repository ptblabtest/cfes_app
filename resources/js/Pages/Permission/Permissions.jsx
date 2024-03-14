import Tables from "@/Components/Tables";
import { Head } from "@inertiajs/react";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import React from "react";
import HeaderTitle from "@/Components/Header/HeaderTitle";

const Permissions = ({ items, fields, entity, auth }) => {
    return (
        <AuthenticatedLayout user={auth.user}>
            <Head title={entity} />
            <HeaderTitle title={'Admin Only - Role Setting'}   />
            <Tables items={items} fields={fields} entity={entity} />
        </AuthenticatedLayout>
    );
};

export default Permissions;