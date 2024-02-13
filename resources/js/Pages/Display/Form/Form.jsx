import React from "react";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout";
import { Head, usePage } from "@inertiajs/react";
import HeaderTitle from "@/Components/Header/HeaderTitle";
import FormCard from "@/Components/Content/FormCard";
import SectionFormCard from "@/Components/Content/SectionFormCard"; // Ensure this is imported

const Form = ({ entity, item, fields, sections, title, storeUrl, updateUrl }) => {
    const { auth } = usePage().props;

    return (
        <AuthenticatedLayout user={auth.user}>
            <Head title={title} />
            <HeaderTitle
                title={"Form " + title}
                breadcrumbs={[
                    { name: "Home", url: "/dashboard" },
                    { name: title, url: `/${entity}` },
                    { name: item ? `Edit ${title}` : `Tambah ${title}` },
                ]}
            />
            {/* Directly conditionally render within the JSX */}
            {fields ? (
                <FormCard
                    item={item}
                    entity={entity}
                    fields={fields}
                    title={title}
                    storeUrl={storeUrl} 
                    updateUrl={updateUrl}
                />
            ) : (
                <SectionFormCard
                    item={item}
                    entity={entity}
                    sections={sections}
                    title={title}
                    storeUrl={storeUrl} 
                    updateUrl={updateUrl}
                />
            )}
        </AuthenticatedLayout>
    );
};

export default Form;
