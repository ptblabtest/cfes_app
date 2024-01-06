import React from "react";
import { Link } from "@inertiajs/react";
import ItemRenderer from "@/Components/Render/ItemRenderer";

const TableRow = ({ item, fields, entity }) => {
    const imageSize = { width: 100, height: 100 };

    return (
        <tr className="hover:bg-gray-100">
            {Object.keys(fields).map((fieldKey, index) => {
                if (index === 0) {
                    return (
                        <td
                            key={fieldKey}
                            className="px-6 py-4 whitespace-nowrap font-bold"
                        >
                            <Link href={`/${entity}/show/${item.id}`}>
                                {" "}
                                <ItemRenderer
                                    item={item}
                                    fieldKey={fieldKey}
                                    fieldConfig={fields[fieldKey]}
                                    imageSize={imageSize}
                                />
                            </Link>
                        </td>
                    );
                }
                return (
                    <td key={fieldKey} className="px-6 py-4 whitespace-nowrap">
                        <ItemRenderer
                            item={item}
                            fieldKey={fieldKey}
                            fieldConfig={fields[fieldKey]}
                            imageSize={imageSize}
                        />
                    </td>
                );
            })}
        </tr>
    );
};

export default TableRow;
