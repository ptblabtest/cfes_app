import React from "react";
import { Link } from "@inertiajs/react";
import ItemRenderer from "../Render/ItemRenderer";

const TableRow = ({ item, fields}) => {
    const imageSize = { width: 100, height: 100 };

    return (
        <tr className="hover:bg-gray-100">
            {Object.keys(fields).map((fieldKey, index) => (
                <td key={fieldKey} className="px-6 py-4 whitespace-nowrap">
                    {index === 0 ? (
                        <Link href={item.showUrl}  className="font-bold cursor-pointer">
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
