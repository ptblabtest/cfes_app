import { Link } from "@inertiajs/react";
import useEntityActions from "@/Hooks/useEntityActions";

export const ActionButtons = ({ entity, handleDeleteClick, onImportClick }) => {
    const { create, import: importAction, export: exportAction } = useEntityActions(entity, handleDeleteClick);

    return (
        <div>
            <Link
                href={create.href}
                className="inline-flex items-center justify-center bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                style={{ minWidth: "100px" }}
            >
                {create.label}
            </Link>
            <button
                onClick={onImportClick}
                className="inline-flex items-center justify-center bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded ml-4"
                style={{ minWidth: "100px" }}
            >
                {importAction.label}
            </button>
            <Link
                href={exportAction.href}
                className="inline-flex items-center justify-center bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded ml-4"
                style={{ minWidth: "100px" }}
            >
                {exportAction.label}
            </Link>
        </div>
    );
};
