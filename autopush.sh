#!/bin/bash

WATCHDIR="/usr/share/dolibarr/custom/verifactu"

cd "$WATCHDIR"

# Bucle infinito
inotifywait -m -r -e modify,create,delete "$WATCHDIR" | while read path action file; do
    echo "[AutoPush] Cambio detectado: $action $file"

    git add .

    git commit -m "AutoPush: $action $file" >/dev/null 2>&1

    git push >/dev/null 2>&1

done
