#!/usr/bin/env bash

# Base path
base_path=$(pwd)

function readBool {
    read var
    if [ $1 == 1 ];then
        # Default 1, look for specific 0 or assume 1
        retval=1
        if [[ ${var} == 0 || ${var,,} == "n" || ${var,,} == "no" ]];then
            retval=0
        fi
    else
        # Default 0 (or not set, and assume default 0) look for specific 1 or assume 0
        retval=0
        if [[ ${var} == 1 || ${var,,} == "y" || ${var,,} == "yes" ]];then
           retval=1
        fi
    fi
    echo ${retval}
}

function readString {
    read string
    if [ -z ${string} ];then
        string=$1
    fi
    echo ${string}
}

function echoMsg {
    echo -e "\e[1m  - $1\e[0m"
}

function echoErrorMsg {
    echo -e "\e[31m  - $1\e[0m"
}

function checkEmptyWorkingDir {
    if [ "$(ls -A ${base_path})" ]; then
        echoErrorMsg "Working directory not empty, aborting!"
        echo
        exit 1
    fi
}