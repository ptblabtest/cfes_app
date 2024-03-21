import React from "react";
import { PaperClipIcon } from "@heroicons/react/24/outline";

const FileComponent = ({ fileUrl }) => {
    if (!fileUrl) return "No File";

    const fileExtension = fileUrl.split(".").pop().toLowerCase();

    return (
        <li className="flex items-center justify-between py-4 pl-4 pr-5 text-sm leading-6">
            <div className="flex w-0 flex-1 items-center">
                <PaperClipIcon
                    className="h-5 w-5 flex-shrink-0 text-gray-400"
                    aria-hidden="true"
                />
                <div className="ml-4 flex min-w-0 flex-1 gap-2">
                    <span className="truncate font-medium">
                        File
                    </span>
                </div>
            </div>
            <div className="ml-4 flex-shrink-0">
                <a
                    href={fileUrl}
                    className="font-medium text-indigo-600 hover:text-indigo-500"
                >
                    {fileExtension === "pdf" ? "View PDF" : "Download"}
                </a>
            </div>
        </li>
    );
};

export default FileComponent;
