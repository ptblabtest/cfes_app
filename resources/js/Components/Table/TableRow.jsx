import React from "react";
import { Link } from "@inertiajs/react";
import ItemRenderer from "../Render/ItemRenderer";

const TableRow = ({ item, fields, entity }) => {
    const imageSize = { width: 100, height: 100 };
    const showUrl = `/${entity}/show/${item.id}`;

    return (
        <tr className="hover:bg-gray-100">
            {Object.keys(fields).map((fieldKey, index) => (
                <td key={fieldKey} className="px-4 py-2 text-left whitespace-nowrap">
                    {index === 0 ? (
                        <Link href={showUrl} className="font-bold text-left cursor-pointer">
                            <ItemRenderer
                                item={item}
                                fieldKey={fieldKey}
                                fieldConfig={fields[fieldKey]}
                                imageSize={imageSize}
                            />
                        </Link>
                    ) : (
                        <ItemRenderer
                            item={item}
                            fieldKey={fieldKey}
                            fieldConfig={fields[fieldKey]}
                            imageSize={imageSize}
                        />
                    )}
                </td>
            ))}
        </tr>
    );
};

export default TableRow;
