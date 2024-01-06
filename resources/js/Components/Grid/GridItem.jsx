import React from "react";
import ItemRenderer from "../Render/ItemRenderer"; // Import ItemRenderer
import { Link } from "@inertiajs/react";

const GridItem = ({ item, fields, entity }) => {
    const imageSize = { width: "100%", height: "100%" }; // Define the size here
    const showUrl = `/${entity}/show/${item.id}`; // Construct the URL for the "show" page

    return (
        <div className="group relative mt-6 bg-white shadow rounded-lg overflow-hidden">
            <div className="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80">
                {fields.image && (
                    <ItemRenderer
                        item={item}
                        fieldKey="image"
                        fieldConfig={fields.image}
                        imageSize={imageSize}
                    />
                )}
            </div>
            <Link href={showUrl} className="m-4 flex justify-between">
                <div>
                    {Object.keys(fields).map((fieldKey, index) => {
                        if (fieldKey !== "image") {
                            return (
                                <div key={fieldKey}>
                                    {index === 0 ? (
                                        <h2 className="font-bold text-lg">
                                            <ItemRenderer
                                                item={item}
                                                fieldKey={fieldKey}
                                                fieldConfig={fields[fieldKey]}
                                            />
                                        </h2>
                                    ) : (
                                        <ItemRenderer
                                            item={item}
                                            fieldKey={fieldKey}
                                            fieldConfig={fields[fieldKey]}
                                        />
                                    )}
                                </div>
                            );
                        }
                        return null;
                    })}
                </div>
            </Link>
        </div>
    );
};

export default GridItem;
