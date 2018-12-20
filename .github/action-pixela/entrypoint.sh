#!/bin/sh

echo 'echo $*'
echo $*

jq . $GITHUB_EVENT_PATH
